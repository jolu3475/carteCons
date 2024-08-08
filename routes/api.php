<?php

use Illuminate\Http\Request;
use App\Http\Controllers\chartJS;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Dans routes/api.php
Route::get('/chart', [chartJS::class, 'index']);

Route::middleware(['web'])->post('/registerImg', [chartJS::class, 'registerImg']);

Route::middleware(['web'])->post('/email', [chartJS::class, 'email']);

Route::middleware(['web'])->post('/verify', [chartJS::class, 'verify']);
