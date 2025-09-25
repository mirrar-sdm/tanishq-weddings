<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\JewelleryPositionController;

// Jewellery position management routes
Route::post('/jewellery/save-positions', [JewelleryPositionController::class, 'savePositions']);
Route::get('/jewellery/load-positions', [JewelleryPositionController::class, 'loadPositions']);

// One-time migration route (remove after migration is complete)
Route::get('/jewellery/migrate-local-to-firebase', [JewelleryPositionController::class, 'migrateLocalToFirebase']);

// Test route for Firebase connectivity
Route::get('/jewellery/test-firebase', [JewelleryPositionController::class, 'testFirebase']);


