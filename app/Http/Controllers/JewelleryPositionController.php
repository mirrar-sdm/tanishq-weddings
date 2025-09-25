<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JewelleryPositionController extends Controller
{
    private $positionsFile = 'data/label-positions.json';

    public function savePositions(Request $request)
    {
        try {
            $modelImage = $request->input('model_image');
            $positions = $request->input('positions');
            $deviceType = $request->input('device_type', 'desktop'); // new parameter
            
            // Get existing positions using Storage
            $existingPositions = [];
            if (Storage::exists($this->positionsFile)) {
                $existingPositions = json_decode(Storage::get($this->positionsFile), true) ?: [];
            }
            
            // Initialize structure if doesn't exist
            if (!isset($existingPositions[$modelImage])) {
                $existingPositions[$modelImage] = [];
            }
            
            // Update positions for this model and device type
            $existingPositions[$modelImage][$deviceType] = $positions;
            
            // Save using Storage
            Storage::put(
                $this->positionsFile, 
                json_encode($existingPositions, JSON_PRETTY_PRINT)
            );
            
            return response()->json(['success' => true, 'message' => 'Positions saved successfully']);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to save positions: ' . $e->getMessage()]);
        }
    }
    
    public function loadPositions()
    {
        try {
            if (Storage::exists($this->positionsFile)) {
                $positions = json_decode(Storage::get($this->positionsFile), true) ?: [];
                return response()->json(['success' => true, 'positions' => $positions]);
            }
            
            return response()->json(['success' => true, 'positions' => []]);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to load positions: ' . $e->getMessage()]);
        }
    }
}
