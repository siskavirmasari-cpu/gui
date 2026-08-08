<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetiKemasController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\CustomAuthController;

/*
|--------------------------------------------------------------------------
| 1. AKSES OPERATOR (HARUS LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:operasional'])->group(function () {
    Route::get('/operator', [OperatorController::class, 'index'])->name('operator.index');
    Route::post('/operator/store-petikemas', [OperatorController::class, 'storePetiKemas'])->name('operator.store.petikemas');
    Route::post('/operator/store-suratjalan', [OperatorController::class, 'storeSuratJalan'])->name('operator.store.suratjalan');
    Route::post('/operator/store-barang', [OperatorController::class, 'storeBarang'])->name('operator.store.barang');
    Route::post('/operator/store-dokumen', [OperatorController::class, 'storeDokumen'])->name('operator.store.dokumen');
});

/*
|--------------------------------------------------------------------------
| 2. LOGIN TERPISAH
|--------------------------------------------------------------------------
*/
Route::get('/login/admin', [CustomAuthController::class, 'showAdminLogin'])->name('login.admin');
Route::post('/login/admin', [CustomAuthController::class, 'loginAdmin']);

Route::get('/login/pimpinan', [CustomAuthController::class, 'showPimpinanLogin'])->name('login.pimpinan');
Route::post('/login/pimpinan', [CustomAuthController::class, 'loginPimpinan']);

Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard', [AdminController::class, 'dashboard']);

Route::middleware(['auth', 'role:admin,pimpinan,operasional'])->group(function () {
    Route::resource('peti-kemas', PetiKemasController::class);
    Route::patch('/peti-kemas/{id}/update-status', [PetiKemasController::class, 'updateStatus'])->name('peti-kemas.update-status');
    Route::resource('barang', BarangController::class);
    Route::resource('trip', TripController::class);
    Route::get('/laporan-operasional', [AdminController::class, 'laporan'])->name('laporan.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin,pimpinan,operasional'])->group(function () {
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::post('/dokumen/upload', [DokumenController::class, 'store'])->name('dokumen.store');
    Route::put('/dokumen/{id}', [DokumenController::class, 'update'])->name('dokumen.update');
    Route::delete('/dokumen/{id}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');
    Route::patch('/dokumen/verifikasi/{id}', [DokumenController::class, 'verifikasi'])->name('dokumen.verifikasi');
    Route::get('/tracking-dokumen', [DokumenController::class, 'tracking'])->name('tracking.index');
});

require __DIR__.'/auth.php';