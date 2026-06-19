<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WeightController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/weights', [WeightController::class, 'index']); 
Route::get('/weights/{weight}', [WeightController::class, 'show']);

// 認証ありAPIとして別途実装が必要
Route::middleware('auth:sanctum')->group(function () {
    Route::delete('/weights/{weight}', [WeightController::class, 'destroy']);
});
