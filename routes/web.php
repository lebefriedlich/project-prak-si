<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAlternatifController;
use App\Http\Controllers\IPKController;
use App\Http\Controllers\KemampuanMengajarController;
use App\Http\Controllers\KerjaSamaController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiReferensiController;
use App\Http\Controllers\TesPemrogramanController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login-post');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria');
    Route::post('/kriteria', [KriteriaController::class, 'store'])->name('kriteria.store');
    Route::post('/kriteria/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
    Route::delete('/kriteria/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');

    Route::get('/sub-kriteria/ipk', [IPKController::class, 'index'])->name('sub_kriteria.ipk.index');
    Route::post('/sub-kriteria/ipk', [IPKController::class, 'store'])->name('sub_kriteria.ipk.store');
    Route::post('/sub-kriteria/ipk/{id}', [IPKController::class, 'update'])->name('sub_kriteria.ipk.update');
    Route::delete('/sub-kriteria/ipk/{id}', [IPKController::class, 'destroy'])->name('sub_kriteria.ipk.destroy');

    Route::get('/sub-kriteria/tes-pemrograman', [TesPemrogramanController::class, 'index'])->name('sub_kriteria.tes_pemrograman.index');
    Route::post('/sub-kriteria/tes-pemrograman', [TesPemrogramanController::class, 'store'])->name('sub_kriteria.tes_pemrograman.store');
    Route::post('/sub-kriteria/tes-pemrograman/{id}', [TesPemrogramanController::class, 'update'])->name('sub_kriteria.tes_pemrograman.update');
    Route::delete('/sub-kriteria/tes-pemrograman/{id}', [TesPemrogramanController::class, 'destroy'])->name('sub_kriteria.tes_pemrograman.destroy');

    Route::get('/sub-kriteria/kemampuan-mengajar', [KemampuanMengajarController::class, 'index'])->name('sub_kriteria.kemampuan_mengajar.index');
    Route::post('/sub-kriteria/kemampuan-mengajar', [KemampuanMengajarController::class, 'store'])->name('sub_kriteria.kemampuan_mengajar.store');
    Route::post('/sub-kriteria/kemampuan-mengajar/{id}', [KemampuanMengajarController::class, 'update'])->name('sub_kriteria.kemampuan_mengajar.update');
    Route::delete('/sub-kriteria/kemampuan-mengajar/{id}', [KemampuanMengajarController::class, 'destroy'])->name('sub_kriteria.kemampuan_mengajar.destroy');

    Route::get('/sub-kriteria/nilai-referensi', [NilaiReferensiController::class, 'index'])->name('sub_kriteria.nilai_referensi.index');
    Route::post('/sub-kriteria/nilai-referensi', [NilaiReferensiController::class, 'store'])->name('sub_kriteria.nilai_referensi.store');
    Route::post('/sub-kriteria/nilai-referensi/{id}', [NilaiReferensiController::class, 'update'])->name('sub_kriteria.nilai_referensi.update');
    Route::delete('/sub-kriteria/nilai-referensi/{id}', [NilaiReferensiController::class, 'destroy'])->name('sub_kriteria.nilai_referensi.destroy');

    Route::get('/sub-kriteria/kerja-sama', [KerjaSamaController::class, 'index'])->name('sub_kriteria.kerja_sama.index');
    Route::post('/sub-kriteria/kerja-sama', [KerjaSamaController::class, 'store'])->name('sub_kriteria.kerja_sama.store');
    Route::post('/sub-kriteria/kerja-sama/{id}', [KerjaSamaController::class, 'update'])->name('sub_kriteria.kerja_sama.update');
    Route::delete('/sub-kriteria/kerja-sama/{id}', [KerjaSamaController::class, 'destroy'])->name('sub_kriteria.kerja_sama.destroy');

    Route::get('data-alternatif', [DataAlternatifController::class, 'index'])->name('data-alternatif');
    Route::post('data-alternatif', [DataAlternatifController::class, 'store'])->name('data-alternatif.store');
    Route::post('data-alternatif/{id}', [DataAlternatifController::class, 'update'])->name('data-alternatif.update');
    Route::delete('data-alternatif/{id}', [DataAlternatifController::class, 'destroy'])->name('data-alternatif.destroy');

    Route::get('matris-keputusan', [DashboardController::class, 'ShowMatriksKeputusan'])->name('matriks-keputusan');
    Route::get('normalisasi', [DashboardController::class, 'ShowNormalisasi'])->name('normalisasi');
    Route::get('normalisasiBobot-Ranking', [DashboardController::class, 'ShowHasilBobotnRanking'])->name('normalisasiBobot-Ranking');

    Route::post('admin/logout', [LoginController::class, 'logout'])->name('logout_admin');
});

Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');
Route::post('/get-data', [LandingPageController::class, 'getData'])->name('get-data');
