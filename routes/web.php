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
    Route::post('/verifyNumber', 'verifyNumber')->name('verifyNumber');

    Route::get('/format', 'format')->name('format');

    Route::get('/edit/{slug}', 'edit')->name('edit')->where('slug', '[a-z0-9\-]+');
    Route::post('/update/{slug}', 'update')->name('update')->where('slug', '[a-z0-9\-]+');
});

Route::prefix('/login')->name('login.')->controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('index')->middleware(['guest']);
    Route::post('/', 'doLogin')->name('submit');
    Route::delete('/logout', 'logout')->name('logout')->middleware(['auth']);
});

Route::prefix('/back')->name('back.')->controller(BackController::class)->middleware(['auth'])->group( function() {
    Route::get('/', 'index')->name('index');
    Route::get('/userProfile', 'userProfile')->name('profile');
    Route::get('/userManag', 'userManag')->name('user');
});
