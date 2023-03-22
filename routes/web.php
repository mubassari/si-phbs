<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;

Route::get('', [MainController::class, 'beranda'])->name('beranda');

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

Route::resource('indikator', IndikatorController::class);
Route::resource('user', UserController::class);
Route::post('/user/{user}/reset-status', [UserController::class, 'resetStatus'])->name('user.reset-status');
