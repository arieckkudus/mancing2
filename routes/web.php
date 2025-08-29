<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ArtikelController;

Route::get('/', [ArtikelController::class, 'landing_page'])->name('landing_page');

Route::get('/artikel', [ArtikelController::class, 'front_artikel'])->name('artikel');
Route::get('/artikel/{id}/detail', [ArtikelController::class, 'detail_artikel'])->name('artikel.detail');

Route::get('/form-daftar', [AnggotaController::class, 'form_daftar'])->name('form_daftar');
Route::post('/form-daftar/daftar', [AnggotaController::class, 'daftar_anggota'])->name('daftar-anggota.store');

Route::get('/login', [AuthController::class, 'form_login'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('dashboard')->group(function () {
    // Dashboard home
    Route::get('/', [DashboardController::class, 'show_dashboard'])->name('dashboard');

    // Anggota
    Route::get('/anggota', [AnggotaController::class, 'show_table_anggota'])->name('dashboard.anggota');
    Route::post('/anggota/{id}/accept', [AnggotaController::class, 'accept'])->name('anggota.accept');
    Route::get('/kartu_anggota/{id}', [AnggotaController::class, 'show_kartu_anggota'])->name('kartu_anggota');

    // Artikel
    Route::get('/artikel', [ArtikelController::class, 'show_table_artikel'])->name('dashboard.artikel');
    Route::get('/artikel/form', [ArtikelController::class, 'form_artikel'])->name('form_artikel');
    Route::post('/artikel/daftar', [ArtikelController::class, 'daftar_artikel'])->name('daftar-artikel.store');
    Route::post('/artikel/{id}/accept', [ArtikelController::class, 'accept'])->name('artikel.accept');
    Route::get('/artikel/form/{id}', [ArtikelController::class, 'form_artikel'])->name('form_artikel.edit');
    Route::post('/artikel/save', [ArtikelController::class, 'save_artikel'])->name('artikel.save');
    Route::post('/artikel/{id}', [ArtikelController::class, 'hapus_artikel'])->name('dashboard.artikel-delete');
});
