<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FirebaseRestService
{
    private $projectId;
    private $accessToken;
    
    public function __construct()
    {
        $this->projectId = 'user-wishlist';
        $this->getAccessToken();
    }
    
    private function getAccessToken()
    {
        try {
            // Create JWT for Firebase authentication
            $privateKey = str_replace('\\n', "\n", env('FIREBASE_PRIVATE_KEY', ''));
            $clientEmail = env('FIREBASE_CLIENT_EMAIL', '');
            
            if (empty($privateKey) || empty($clientEmail)) {
                Log::info('Firebase REST: credentials not configured');
                return null;
            }
            
            $header = json_encode(['typ' => 'JWT', 'alg' => 'RS256']);
            $payload = json_encode([
                'iss' => $clientEmail,
                'scope' => 'https://www.googleapis.com/auth/datastore',
                'aud' => 'https://oauth2.googleapis.com/token',
                'exp' => time() + 3600,
                'iat' => time()
            ]);
            
            $headerEncoded = rtrim(strtr(base64_encode($header), '+/', '-_'), '=');
            $payloadEncoded = rtrim(strtr(base64_encode($payload), '+/', '-_'), '=');
            
            $signature = '';
            openssl_sign("$headerEncoded.$payloadEncoded", $signature, $privateKey, 'SHA256');
            $signatureEncoded = rtrim(strtr(base64_encode($signature), '+/', '-_'), '=');
            
            $jwt = "$headerEncoded.$payloadEncoded.$signatureEncoded";
            
            // Get access token
            $response = Http::asForm()->post('https://oauth2.googleapis.com/token', [
                'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
                'assertion' => $jwt
            ]);
            
            if ($response->successful()) {
                $this->accessToken = $response->json()['access_token'];
                Log::info('Firebase REST: access token obtained successfully');
                return $this->accessToken;
            } else {
                Log::error('Firebase REST: failed to get access token', $response->json());
                return null;
            }
            
        } catch (\Exception $e) {
            Log::error('Firebase REST: authentication failed', ['error' => $e->getMessage()]);
            return null;
        }
    }
    
    public function saveDocument($collection, $document, $data)
    {
        if (!$this->accessToken) return false;
        
        try {
            $url = "https://firestore.googleapis.com/v1/projects/{$this->projectId}/databases/(default)/documents/{$collection}/{$document}";
            
            // Convert data to Firestore format
            $firestoreData = $this->convertToFirestoreFormat($data);
            
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Content-Type' => 'application/json'
            ])->patch($url, [
                'fields' => $firestoreData
            ]);
            
            if ($response->successful()) {
                Log::info('Firebase REST: document saved successfully', ['collection' => $collection, 'document' => $document]);
                return true;
            } else {
                Log::error('Firebase REST: save failed', $response->json());
                return false;
            }
            
        } catch (\Exception $e) {
            Log::error('Firebase REST: save error', ['error' => $e->getMessage()]);
            return false;
        }
    }
    
    public function getDocument($collection, $document)
    {
        if (!$this->accessToken) return null;
        
        try {
            $url = "https://firestore.googleapis.com/v1/projects/{$this->projectId}/databases/(default)/documents/{$collection}/{$document}";
            
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->accessToken
            ])->get($url);
            
            if ($response->successful()) {
                $data = $response->json();
                return $this->convertFromFirestoreFormat($data['fields'] ?? []);
            } else {
                Log::info('Firebase REST: document not found', ['collection' => $collection, 'document' => $document]);
                return null;
            }
            
        } catch (\Exception $e) {
            Log::error('Firebase REST: get error', ['error' => $e->getMessage()]);
            return null;
        }
    }
    
    public function listCollection($collection)
    {
        if (!$this->accessToken) return [];
        
        try {
            $url = "https://firestore.googleapis.com/v1/projects/{$this->projectId}/databases/(default)/documents/{$collection}";
            
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->accessToken
            ])->get($url);
            
            if ($response->successful()) {
                $documents = [];
                $data = $response->json();
                
                if (isset($data['documents'])) {
                    foreach ($data['documents'] as $doc) {
                        $docId = basename($doc['name']);
                        $documents[$docId] = $this->convertFromFirestoreFormat($doc['fields'] ?? []);
                    }
                }
                
                return $documents;
            } else {
                Log::info('Firebase REST: collection not found', ['collection' => $collection]);
                return [];
            }
            
        } catch (\Exception $e) {
            Log::error('Firebase REST: list error', ['error' => $e->getMessage()]);
            return [];
        }
    }
    
    private function convertToFirestoreFormat($data)
    {
        $result = [];
        
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                // Check if it's an indexed array (list) or associative array (map)
                if (array_keys($value) === range(0, count($value) - 1)) {
                    // It's an indexed array - convert to arrayValue
                    $arrayItems = [];
                    foreach ($value as $item) {
                        if (is_array($item)) {
                            $arrayItems[] = ['mapValue' => ['fields' => $this->convertToFirestoreFormat($item)]];
                        } elseif (is_numeric($item)) {
                            $arrayItems[] = ['doubleValue' => (float)$item];
                        } elseif (is_string($item)) {
                            $arrayItems[] = ['stringValue' => $item];
                        } elseif (is_bool($item)) {
                            $arrayItems[] = ['booleanValue' => $item];
                        }
                    }
                    $result[$key] = ['arrayValue' => ['values' => $arrayItems]];
                } else {
                    // It's an associative array - convert to mapValue
                    $result[$key] = ['mapValue' => ['fields' => $this->convertToFirestoreFormat($value)]];
                }
            } elseif (is_numeric($value)) {
                $result[$key] = ['doubleValue' => (float)$value];
            } elseif (is_string($value)) {
                $result[$key] = ['stringValue' => $value];
            } elseif (is_bool($value)) {
                $result[$key] = ['booleanValue' => $value];
            }
        }
        
        return $result;
    }
    
    private function convertFromFirestoreFormat($fields)
    {
        $result = [];
        
        foreach ($fields as $key => $value) {
            if (isset($value['mapValue']['fields'])) {
                $result[$key] = $this->convertFromFirestoreFormat($value['mapValue']['fields']);
            } elseif (isset($value['arrayValue']['values'])) {
                $arrayItems = [];
                foreach ($value['arrayValue']['values'] as $item) {
                    if (isset($item['mapValue']['fields'])) {
                        $arrayItems[] = $this->convertFromFirestoreFormat($item['mapValue']['fields']);
                    } elseif (isset($item['doubleValue'])) {
                        $arrayItems[] = (float)$item['doubleValue'];
                    } elseif (isset($item['stringValue'])) {
                        $arrayItems[] = $item['stringValue'];
                    } elseif (isset($item['booleanValue'])) {
                        $arrayItems[] = $item['booleanValue'];
                    }
                }
                $result[$key] = $arrayItems;
            } elseif (isset($value['doubleValue'])) {
                $result[$key] = (float)$value['doubleValue'];
            } elseif (isset($value['stringValue'])) {
                $result[$key] = $value['stringValue'];
            } elseif (isset($value['booleanValue'])) {
                $result[$key] = $value['booleanValue'];
            }
        }
        
        return $result;
    }
}
