<?php

use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

// Route::group(['prefix' => 'dashboard'], function () {
    //single action controllers
    Route::get('/', function () { return view('admin.index'); })->name('admin.home');
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('admin.pengguna');
    Route::get('/pengguna/tambah', [PenggunaController::class, 'create'])->name('admin.pengguna.tambah');

    Route::group(['prefix' => 'pages', 'as' => 'page.'], function () {
        Route::view('/404-page', 'admin.pages.404')->name('404');
        Route::view('/blank-page', 'admin.pages.blank')->name('blank');
        Route::view('/create-account-page', 'admin.pages.create-account')->name('create-account');
        Route::view('/forgot-password-page', 'admin.pages.forgot-password')->name('forgot-password');
        Route::view('/login-page', 'admin.pages.login')->name('login');
    });
// });

