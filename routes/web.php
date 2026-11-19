<?php

use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('vendors.index'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Semua role boleh MELIHAT daftar (menu di sidebar tampil untuk semua role)
    Route::middleware('role:admin,customer,petugas')->group(function () {
        Route::get('/vendors', [VendorController::class, 'index'])->name('vendors.index');
        Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
        Route::get('/armada', [ArmadaController::class, 'index'])->name('armada.index');
    });

    // Armada: admin & petugas boleh tambah/ubah, hanya admin yang boleh hapus
    Route::middleware('role:admin,petugas')->group(function () {
        Route::resource('armada', ArmadaController::class)->only(['create', 'store', 'edit', 'update']);
    });

    // Vendor, Barang, hapus Armada: hanya admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('vendors', VendorController::class)->except(['index', 'show']);
        Route::resource('barang', BarangController::class)->except(['index', 'show']);
        Route::delete('/armada/{armada}', [ArmadaController::class, 'destroy'])->name('armada.destroy');
    });
});
