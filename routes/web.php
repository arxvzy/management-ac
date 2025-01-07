<?php

use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

// Route::group(['prefix' => 'dashboard'], function () {
    //single action controllers
    Route::get('/', function () { return view('admin.index'); })->name('admin.home');

    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('admin.pengguna.index');
    Route::get('/pengguna/tambah', [PenggunaController::class, 'create'])->name('admin.pengguna.tambah');
    Route::post('/pengguna', [PenggunaController::class, 'store'])->name('admin.pengguna.simpan');
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('admin.pengguna.hapus');
    Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('admin.pengguna.edit');
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('admin.pengguna.update');
// });

