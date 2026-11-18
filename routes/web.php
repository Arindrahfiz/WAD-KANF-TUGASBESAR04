<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('vendors.index'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/vendors', [VendorController::class, 'index'])
        ->middleware('role:admin,customer')
        ->name('vendors.index');

    Route::middleware('role:admin')->group(function () {
        Route::resource('vendors', VendorController::class)->except(['index', 'show']);
    });
});