<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\DiskonController;

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('users', UserController::class)->names('admin.users');
    Route::resource('paket', PaketController::class)->names('admin.paket');
    Route::resource('diskon', DiskonController::class)->names('admin.diskon');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan.index');
    Route::get('/laporan/transaksi', [LaporanController::class, 'transaksi'])->name('admin.laporan.transaksi');
    Route::get('/laporan/pdf', [LaporanController::class, 'downloadPdf'])->name('admin.laporan.pdf');
    Route::get('/laporan/excel', [LaporanController::class, 'downloadExcel'])->name('admin.laporan.excel');
});
