<?php

use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return view('pages.beranda');
});

Route::prefix('pengguna')->name('pengguna.')->group(function () {
    Route::get('daftar')->name('daftar');
    Route::get('masuk')->name('masuk');
    Route::get('list')->name('list');
    Route::get('keluar')->name('keluar');

    Route::prefix('{pengguna}')->group(function () {
        Route::get('')->name('tampil');
        Route::get('ubah')->name('ubah');
        Route::put('')->name('update');
        Route::delete('')->name('hapus');
    });
});

Route::prefix('survei')->name('survei.')->group(function () {
    Route::get('')->name('isi');
    Route::get('list')->name('list');

    Route::prefix('{pengguna}')->name('pengguna.')->group(function () {
        Route::get('')->name('detail');
        Route::post('')->name('verif');
    });
});
