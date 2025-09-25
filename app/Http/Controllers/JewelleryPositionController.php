<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Services\FirebaseRestService;

class JewelleryPositionController extends Controller
{
    private $firebaseRest;
    private $collection = 'jewellery_positions';

    public function __construct()
    {
        try {
            Log::info('Initializing Firebase REST service...');
            $this->firebaseRest = new FirebaseRestService();
            Log::info('Firebase REST service initialized successfully!');
        } catch (\Exception $e) {
            Log::error('Firebase REST initialization failed: ' . $e->getMessage());
            throw new \Exception('Firebase service is required but not available: ' . $e->getMessage());
        }
    }

    public function savePositions(Request $request)
    {
        $modelImage = $request->input('model_image');
        $positions = $request->input('positions');
        $deviceType = $request->input('device_type', 'desktop');
        
        return $this->saveToFirebase($modelImage, $positions, $deviceType);
    }
    
    public function loadPositions()
    {
        return $this->loadFromFirebase();
    }

    private function saveToFirebase($modelImage, $positions, $deviceType)
    {
        try {
            Log::info('Attempting to save to Firebase via REST', [
                'model_image' => $modelImage,
                'device_type' => $deviceType,
                'collection' => $this->collection
            ]);

            if (!$this->firebaseRest) {
                throw new \Exception('Firebase REST service not initialized');
            }

            // Sanitize the document ID (remove slashes and other special characters)
            $documentId = str_replace(['/', '\\', '.'], '_', $modelImage);
            Log::info('Sanitized document ID', ['original' => $modelImage, 'sanitized' => $documentId]);

            // Get existing document or create new one
            $existingData = [];
            try {
                $existingDoc = $this->firebaseRest->getDocument($this->collection, $documentId);
                if ($existingDoc) {
                    $existingData = $existingDoc;
                    Log::info('Found existing data', ['data_keys' => array_keys($existingData)]);
                }
            } catch (\Exception $e) {
                Log::info('No existing document found, creating new one');
            }
            
            // Update positions for this device type
            $existingData[$deviceType] = $positions;
            
            Log::info('Preparing to save data', [
                'device_type' => $deviceType,
                'positions_count' => count($positions),
                'total_device_types' => array_keys($existingData)
            ]);

            // Save to Firebase via REST
            $result = $this->firebaseRest->saveDocument($this->collection, $documentId, $existingData);
            Log::info('Successfully saved to Firebase via REST!', ['result' => $result]);
            
            return response()->json(['success' => true, 'message' => 'Positions saved successfully to Firebase']);
            
        } catch (\Exception $e) {
            Log::error('Firebase REST save failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to save to Firebase: ' . $e->getMessage()], 500);
        }
    }

    private function loadFromFirebase()
    {
        try {
            if (!$this->firebaseRest) {
                throw new \Exception('Firebase REST service not initialized');
            }

            Log::info('Loading from Firebase via REST');
            $positions = [];
            $documents = $this->firebaseRest->listCollection($this->collection);
            
            foreach ($documents as $documentId => $documentData) {
                $positions[$documentId] = $documentData;
            }
            
            Log::info('Successfully loaded from Firebase via REST', ['document_count' => count($positions)]);
            return response()->json(['success' => true, 'positions' => $positions]);
            
        } catch (\Exception $e) {
            Log::error('Firebase REST load failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to load from Firebase: ' . $e->getMessage()], 500);
        }
    }

    // Test method to verify Firebase connectivity
    public function testFirebase()
    {
        try {
            Log::info('Testing Firebase REST connectivity...');
            
            if (!$this->firebaseRest) {
                throw new \Exception('Firebase REST service not initialized');
            }

            // Try to write a simple test document
            $testData = ['status' => 'connected', 'timestamp' => time(), 'test' => true];
            
            Log::info('Writing test document via REST...');
            $result = $this->firebaseRest->saveDocument('test', 'connection', $testData);
            Log::info('Test document written successfully', ['result' => $result]);

            // Try to read it back
            $data = $this->firebaseRest->getDocument('test', 'connection');
            if ($data) {
                Log::info('Test document read successfully', ['data' => $data]);
                return response()->json([
                    'success' => true, 
                    'message' => 'Firebase REST connection working!',
                    'data' => $data
                ]);
            } else {
                throw new \Exception('Test document not found after writing');
            }

        } catch (\Exception $e) {
            Log::error('Firebase REST test failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Firebase REST test failed: ' . $e->getMessage()], 500);
        }
    }

    // Migration method to move existing local data to Firebase (one-time use)
    public function migrateLocalToFirebase()
    {
        try {
            $positionsFile = 'data/label-positions.json';
            
            if (!Storage::exists($positionsFile)) {
                return response()->json(['success' => false, 'message' => 'No local data to migrate']);
            }

            $localData = json_decode(Storage::get($positionsFile), true) ?: [];
            $migratedCount = 0;

            foreach ($localData as $modelImage => $deviceData) {
                $documentId = str_replace(['/', '\\', '.'], '_', $modelImage);
                
                try {
                    $result = $this->firebaseRest->saveDocument($this->collection, $documentId, $deviceData);
                    $migratedCount++;
                    Log::info("Migrated {$modelImage} to Firebase", ['result' => $result]);
                } catch (\Exception $e) {
                    Log::error("Failed to migrate {$modelImage}: " . $e->getMessage());
                }
            }

            return response()->json([
                'success' => true, 
                'message' => "Migrated {$migratedCount} model images to Firebase"
            ]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Migration failed: ' . $e->getMessage()]);
        }
    }
}
