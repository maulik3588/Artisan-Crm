<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Authentication routes (no middleware required)
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

// Protected routes that require authentication
Route::middleware('api.token')->group(function () {
   
});


