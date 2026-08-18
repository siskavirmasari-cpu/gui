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
use App\Http\Controllers\FormatDokumenController;
use App\Models\Barang;

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
Route::get('/', [CustomAuthController::class, 'showAdminLogin'])->name('login.admin');
Route::post('/login/admin', [CustomAuthController::class, 'loginAdmin']);

Route::get('/login/pimpinan', [CustomAuthController::class, 'showPimpinanLogin'])->name('login.pimpinan');
Route::post('/login/pimpinan', [CustomAuthController::class, 'loginPimpinan']);

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/dokumen-pimpinan', [AdminController::class, 'dokumenPimpinan'])->name('dokumen.pimpinan');

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

Route::middleware(['auth', 'role:admin,pimpinan'])->group(function () {
    Route::get('/format', [FormatDokumenController::class, 'index'])->name('format.index');
    Route::post('/format', [FormatDokumenController::class, 'store'])->name('format.store');

    // Dynamic routes untuk setiap format
    Route::get('/format/bill', [FormatDokumenController::class, 'showBill'])->name('format.bill');
    Route::post('/format/bill', [FormatDokumenController::class, 'saveBill'])->name('format.bill.save');
    
    Route::get('/format/invoice', [FormatDokumenController::class, 'showInvoice'])->name('format.invoice');
    Route::post('/format/invoice', [FormatDokumenController::class, 'saveInvoice'])->name('format.invoice.save');
    
    Route::get('/format/packing', [FormatDokumenController::class, 'showPacking'])->name('format.packing');
    Route::post('/format/packing', [FormatDokumenController::class, 'savePacking'])->name('format.packing.save');
    
    Route::get('/format/pib', [FormatDokumenController::class, 'showPib'])->name('format.pib');
    Route::post('/format/pib', [FormatDokumenController::class, 'savePib'])->name('format.pib.save');
    
    Route::get('/format/peb', [FormatDokumenController::class, 'showPeb'])->name('format.peb');
    Route::post('/format/peb', [FormatDokumenController::class, 'savePeb'])->name('format.peb.save');
    
    Route::get('/format/dokumen-bea-cukai', [FormatDokumenController::class, 'showDokumenBea'])->name('format.dokumenBea');
    Route::post('/format/dokumen-bea-cukai', [FormatDokumenController::class, 'saveDokumenBea'])->name('format.dokumenBea.save');
    
    Route::get('/format/foto-container', [FormatDokumenController::class, 'showFotoContainer'])->name('format.fotoContainer');
    Route::post('/format/foto-container', [FormatDokumenController::class, 'saveFotoContainer'])->name('format.fotoContainer.save');
    
    Route::get('/format/surat-jalan', [FormatDokumenController::class, 'showSuratJalan'])->name('format.suratJalan');
    Route::post('/format/surat-jalan', [FormatDokumenController::class, 'saveSuratJalan'])->name('format.suratJalan.save');
    
    // View detail format
    Route::get('/format/view/{id}', [FormatDokumenController::class, 'viewFormat'])->name('format.view');
});

require __DIR__.'/auth.php';