<?php

use App\Models\Regular;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\beginController;
use App\Http\Controllers\RepexController;

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

Route::get('/', [beginController::class, 'index'])->name('index')->middleware(['guest']);

Route::prefix('/form')->name('form.')->controller(beginController::class)->middleware(['guest'])->group(function () {
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
    Route::get('/create/{slug}', 'create')->name('create')->middleware(['guest']);
    Route::post('/create/{user}', 'createUsr')->middleware(['guest'])->name('createUsr');
});

Route::prefix('/back')->name('back.')->controller(BackController::class)->middleware(['auth'])->group( function() {
    Route::get('/', 'index')->name('index');

    Route::get('/show/{user}', 'show')->name('show')->where(['user' => '[0-9]+']);
    Route::post('/createpdf/{data}', 'pdfGenerator')->name('pdfGenerator');
    Route::post('/show', 'valid')->name('valid');

    Route::get('/refuser/{id}', 'refuser')->name('refuser');
    Route::post('/refuser', 'refuserSend')->name('refuserSend');

    Route::get('/userManag', 'userManag')->name('user');
    Route::post('/userManag', 'userDelete');
    Route::get('/create', 'create')->name('create');
    Route::post('/create', 'createUrs')->name('createUsr');

    Route::get('/userManag/view/{email}', 'userProfile')->name('profile');

    Route::prefix('/setting')->name('setting.')->group( function() {
        Route::get('/', 'setting')->name('view');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/edit', 'edi');
        Route::get('/notif', 'notif')->name('notif');
    });
});

Route::prefix('/back/settingBack')->name('settingBack.')->middleware('auth')->group( function() {
    Route::resource('/repex', RepexController::class)->except(['show', 'create']);
    Route::resource('/pays', PaysController::class)->except(['show', 'create']);
    Route::prefix('/juridiction')->name('juridiction.')->controller(RepexController::class)->group(function(){
        Route::delete('/remove/{id}', 'removeJurid')->name('remove');
        Route::post('/add/{id}', 'addJurid')->name('add');
    });
});

Route::get('/verifCarte/{slug}', [AuthController::class, 'verifCarte'])->name('verifCarte');
