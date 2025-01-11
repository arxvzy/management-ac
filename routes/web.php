<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PengeluaranController;


    Route::get('/', function () { return view('admin.index'); })->name('admin.home');

    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('admin.pengguna.index');
    Route::get('/pengguna/tambah', [PenggunaController::class, 'create'])->name('admin.pengguna.tambah');
    Route::post('/pengguna', [PenggunaController::class, 'store'])->name('admin.pengguna.simpan');
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('admin.pengguna.hapus');
    Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('admin.pengguna.edit');
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('admin.pengguna.update');

    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('admin.pelanggan.index');
    Route::get('/pelanggan/tambah', [PelangganController::class, 'create'])->name('admin.pelanggan.tambah');
    Route::post('/pelanggan', [PelangganController::class, 'store'])->name('admin.pelanggan.simpan');
    Route::get('/pelanggan/{pelanggan}/edit', [PelangganController::class, 'edit'])->name('admin.pelanggan.edit');
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'destroy'])->name('admin.pelanggan.hapus');
    Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('admin.pelanggan.update');

    Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('admin.pengeluaran.index');
    Route::get('/pengeluaran/tambah', [PengeluaranController::class, 'create'])->name('admin.pengeluaran.tambah');
    Route::post('/pengeluaran', [PengeluaranController::class, 'store'])->name('admin.pengeluaran.simpan');
    Route::get('/pengeluaran/{pengeluaran}/edit', [PengeluaranController::class, 'edit'])->name('admin.pengeluaran.edit');
    Route::delete('/pengeluaran/{id}', [PengeluaranController::class, 'destroy'])->name('admin.pengeluaran.hapus');
    Route::put('/pengeluaran/{id}', [PengeluaranController::class, 'update'])->name('admin.pengeluaran.update');