<?php

use App\Http\Controllers\beginController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/edit/{slug}', 'edit')->name('edit')->where('slug', '[a-z0-9\-]+');
    Route::post('/update/{slug}', 'update')->name('update')->where('slug', '[a-z0-9\-]+');
});
