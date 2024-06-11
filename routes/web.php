<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\beginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [beginController::class, 'index'])->name('index');

Route::prefix('/form')->name('form.')->controller(beginController::class)->group(function () {
    Route::get('/', 'form')->name('index');
    Route::post('/', 'submit')->name('submit');

    Route::get('/format', 'format')->name('format');

    Route::get('/edit/{slug}', 'edit')->name('edit')->where('slug', '[a-z0-9\-]+');
    Route::post('/update/{slug}', 'update')->name('update')->where('slug', '[a-z0-9\-]+');
});

Route::prefix('/login')->name('login.')->controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('form');
    Route::post('/', 'doLogin')->name('submit');
    Route::get('/logout', 'logout')->name('logout');
});

Route::prefix('/back')->name('back.')->controller(BackController::class)->group( function() {
    Route::get('/', 'index')->name('index');
});
