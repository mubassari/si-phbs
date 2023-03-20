<?php

use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return view('pages.beranda');
});

Route::prefix('pengguna')->name('pengguna.')->group(function () {
    Route::get('')->name('list');
    Route::get('daftar')->name('daftar');
    Route::get('masuk')->name('masuk');
    Route::get('keluar')->name('keluar');

    Route::prefix('{pengguna}')->group(function () {
        Route::get('')->name('tampil');
        Route::get('ubah')->name('ubah');
        Route::put('')->name('update');
        Route::delete('')->name('hapus');
    });
});

Route::prefix('survey')->name('survey.')->group(function () {
    Route::get('')->name('isi');
    Route::post('')->name('kirim');
    Route::get('buat')->name('buat');
    Route::post('buat')->name('simpan');
    Route::get('list')->name('list');

    Route::prefix('{pengguna}')->name('pengguna.')->group(function () {
        Route::get('')->name('detail');
        Route::post('')->name('verif');
    });
});

Route::prefix('indikator')->name('indikator.')->group(function () {
    Route::get('')->name('list');
    Route::get('buat')->name('buat');
    Route::post('')->name('simpan');
    Route::prefix('{indikator}')->group(function () {
        Route::get('')->name('tampil');
        Route::get('ubah')->name('ubah');
        Route::put('')->name('update');
        Route::delete('')->name('hapus');
    });
});

Route::view('ts-indikator', 'pages/indikator/index');
Route::view('ts-survey', 'pages/survey/index');
