<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;

Route::get('', [MainController::class, 'beranda'])->name('beranda');

Route::prefix('pengguna')->name('pengguna.')->group(function () {
    Route::get('', [UserController::class, 'list'])->name('list');
    Route::get('daftar', [UserController::class, 'daftar'])->name('daftar');
    Route::get('masuk', [UserController::class, 'masuk'])->name('masuk');
    Route::post('keluar')->name('keluar');

    Route::prefix('{user}')->group(function () {
        Route::get('', [UserController::class, 'tampil'])->name('tampil');
        Route::get('ubah', [UserController::class, 'ubah'])->name('ubah');
        Route::put('')->name('update');
        Route::delete('')->name('hapus');
    });
});

Route::prefix('survey')->name('survey.')->group(function () {
    Route::get('', [SurveyController::class, 'isi'])->name('isi');
    Route::post('')->name('kirim');
    Route::get('list', [SurveyController::class, 'list'])->name('list');
    Route::get('buat', [SurveyController::class, 'buat'])->name('buat');
    Route::post('buat')->name('simpan');

    Route::prefix('{survey}')->group(function () {
        Route::get('ubah', [SurveyController::class, 'ubah'])->name('ubah');
        Route::put('')->name('update');
        Route::delete('')->name('hapus');
    });

    Route::prefix('{user}')->name('pengguna.')->group(function () {
        Route::get('', [SurveyController::class, 'detail'])->name('detail');
        Route::post('')->name('verif');
    });
});

Route::prefix('indikator')->name('indikator.')->group(function () {
    Route::get('', [IndikatorController::class, 'list'])->name('list');
    Route::get('buat', [IndikatorController::class, 'buat'])->name('buat');
    Route::post('')->name('simpan');

    Route::prefix('{indikator}')->group(function () {
        Route::get('', [IndikatorController::class, 'tampil'])->name('tampil');
        Route::get('ubah', [IndikatorController::class, 'ubah'])->name('ubah');
        Route::put('')->name('update');
        Route::delete('')->name('hapus');
    });
});
