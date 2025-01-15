<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PengingatController;
use App\Http\Controllers\PenugasanController;
use App\Http\Controllers\PengeluaranController;

    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('auth.authenticate');



Route::middleware(['auth'])->group(function () {
    Route::get('/', function () { return view('admin.index'); })->name('admin.home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/pengguna/{pengguna}/reset', [AuthController::class, 'reset'])->name('auth.reset');
    Route::put('/pengguna/{pengguna}/reset', [AuthController::class, 'update'])->name('auth.update');

    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('admin.pengguna.index');
    Route::get('/pengguna/tambah', [PenggunaController::class, 'create'])->name('admin.pengguna.tambah');
    Route::post('/pengguna', [PenggunaController::class, 'store'])->name('admin.pengguna.simpan');
    Route::delete('/pengguna/{pengguna}', [PenggunaController::class, 'destroy'])->name('admin.pengguna.hapus');
    Route::get('/pengguna/{pengguna}/edit', [PenggunaController::class, 'edit'])->name('admin.pengguna.edit');
    Route::put('/pengguna/{pengguna}', [PenggunaController::class, 'update'])->name('admin.pengguna.update');

    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('admin.pelanggan.index');
    Route::get('/pelanggan/tambah', [PelangganController::class, 'create'])->name('admin.pelanggan.tambah');
    Route::post('/pelanggan', [PelangganController::class, 'store'])->name('admin.pelanggan.simpan');
    Route::get('/pelanggan/{pelanggan}/edit', [PelangganController::class, 'edit'])->name('admin.pelanggan.edit');
    Route::delete('/pelanggan/{pelanggan}', [PelangganController::class, 'destroy'])->name('admin.pelanggan.hapus');
    Route::put('/pelanggan/{pelanggan}', [PelangganController::class, 'update'])->name('admin.pelanggan.update');

    Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('admin.pengeluaran.index');
    Route::get('/pengeluaran/tambah', [PengeluaranController::class, 'create'])->name('admin.pengeluaran.tambah');
    Route::post('/pengeluaran', [PengeluaranController::class, 'store'])->name('admin.pengeluaran.simpan');
    Route::get('/pengeluaran/{pengeluaran}/edit', [PengeluaranController::class, 'edit'])->name('admin.pengeluaran.edit');
    Route::delete('/pengeluaran/{pengeluaran}', [PengeluaranController::class, 'destroy'])->name('admin.pengeluaran.hapus');
    Route::put('/pengeluaran/{pengeluaran}', [PengeluaranController::class, 'update'])->name('admin.pengeluaran.update');

    Route::get('/jasa', [JasaController::class, 'index'])->name('admin.jasa.index');
    Route::get('/jasa/tambah', [JasaController::class, 'create'])->name('admin.jasa.tambah');
    Route::post('/jasa', [JasaController::class, 'store'])->name('admin.jasa.simpan');
    Route::get('/jasa/{jasa}/edit', [JasaController::class, 'edit'])->name('admin.jasa.edit');
    Route::delete('/jasa/{jasa}', [JasaController::class, 'destroy'])->name('admin.jasa.hapus');
    Route::put('/jasa/{jasa}', [JasaController::class, 'update'])->name('admin.jasa.update');

    Route::get('/order', [OrderController::class, 'index'])->name('admin.order.index');
    Route::get('/order/tambah', [OrderController::class, 'create'])->name('admin.order.tambah');
    Route::post('/order', [OrderController::class, 'store'])->name('admin.order.simpan');
    Route::get('/order/{order}/edit', [OrderController::class, 'edit'])->name('admin.order.edit');
    Route::delete('/order/{order}', [OrderController::class, 'destroy'])->name('admin.order.hapus');
    Route::put('/order/{order}', [OrderController::class, 'update'])->name('admin.order.update');

    Route::get('/penugasan', [PenugasanController::class, 'index'])->name('admin.penugasan.index');
    Route::put('/penugasan/{order}', [PenugasanController::class, 'update'])->name('admin.penugasan.update');
    Route::get('/penugasan/{order}/edit', [PenugasanController::class, 'edit'])->name('admin.penugasan.edit');

    Route::get('/pengingat', [PengingatController::class, 'index'])->name('admin.pengingat.index');
    Route::post('/pengingat/{pelanggan}', [PengingatController::class, 'update'])->name('admin.pengingat.kirim');

    Route::get('/history', [HistoryController::class, 'index'])->name('admin.history.index');
    Route::get('/history/{order}', [HistoryController::class, 'show'])->name('admin.history.show');
});