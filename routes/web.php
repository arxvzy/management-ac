<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PelangganController;

// Route::group(['prefix' => 'dashboard'], function () {
    //single action controllers
    Route::get('/', function () { return view('admin.index'); })->name('admin.home');

    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('admin.pengguna.index');
    Route::get('/pengguna/tambah', [PenggunaController::class, 'create'])->name('admin.pengguna.tambah');
    Route::post('/pengguna', [PenggunaController::class, 'store'])->name('admin.pengguna.simpan');
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('admin.pengguna.hapus');
    Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('admin.pengguna.edit');
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('admin.pengguna.update');

    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('admin.pelanggan.index');
// });

