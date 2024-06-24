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
    Route::get('/', 'index')->name('index');
    Route::post('/', 'submit')->name('submit');

    Route::get('/ins', 'insImg')->name('image');
    Route::post('/ins', 'verifImg')->name('img');

    Route::get('/mail', 'mail')->name('mail');
    Route::post('/mail', 'submitMail')->name('submitMail');
    Route::post('/verifyMail', 'verifyMail')->name('verifyMail');
    Route::get('/valid', 'valid')->name('valid');
    Route::post('/valid', 'validSend')->name('validSend');

    Route::get('/format', 'format')->name('format');
});

Route::prefix('/login')->name('login.')->controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('index')->middleware(['guest']);
    Route::post('/', 'doLogin')->name('submit')->middleware(['guest']);
    Route::delete('/logout', 'logout')->name('logout')->middleware(['auth']);
});

Route::prefix('/back')->name('back.')->controller(BackController::class)->middleware(['auth'])->group( function() {
    Route::get('/', 'index')->name('index');
    Route::get('/userManag', 'userManag')->name('user');
    Route::get('/userManag/view/{email}', 'userProfile')->name('profile');
    Route::get('/userManag/setting', 'setting')->name('setting');
});
