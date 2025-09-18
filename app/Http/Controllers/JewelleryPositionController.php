<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JewelleryPositionController extends Controller
{
    private $positionsFile = 'data/label-positions.json';
    private $mobilePositionsFile = 'data/label-positions-mobile.json';

    public function savePositions(Request $request)
    {
        try {
            $modelImage = $request->input('model_image');
            $positions = $request->input('positions');
            $isMobile = $request->input('is_mobile', false);
            
            // Choose file based on device type
            $file = $isMobile ? $this->mobilePositionsFile : $this->positionsFile;
            
            // Get existing positions
            $existingPositions = [];
            if (file_exists(public_path($file))) {
                $existingPositions = json_decode(file_get_contents(public_path($file)), true) ?: [];
            }
            
            // Update positions for this model
            $existingPositions[$modelImage] = $positions;
            
            // Save back to file
            file_put_contents(
                public_path($file), 
                json_encode($existingPositions, JSON_PRETTY_PRINT)
            );
            
            return response()->json([
                'success' => true, 
                'message' => 'Positions saved successfully',
                'device' => $isMobile ? 'mobile' : 'desktop'
            ]);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to save positions: ' . $e->getMessage()]);
        }
    }
    
    public function loadPositions(Request $request)
    {
        try {
            $isMobile = $request->input('is_mobile', false);
            $file = $isMobile ? $this->mobilePositionsFile : $this->positionsFile;
            
            if (file_exists(public_path($file))) {
                $positions = json_decode(file_get_contents(public_path($file)), true) ?: [];
                return response()->json([
                    'success' => true, 
                    'positions' => $positions,
                    'device' => $isMobile ? 'mobile' : 'desktop'
                ]);
            }
            
            return response()->json([
                'success' => true, 
                'positions' => [],
                'device' => $isMobile ? 'mobile' : 'desktop'
            ]);
            
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to load positions: ' . $e->getMessage()]);
        }
    }
}
