<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TinjauanController;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\UserSettingController;

Route::get('', [MainController::class, 'beranda'])->name('beranda');

Route::middleware(['auth'])->group(function () {
    Route::middleware('redirect.unauthorize:admin')->group(function () {
        Route::resource('user', UserController::class);
        Route::prefix('user')->name('user.')->group(function () {
            Route::prefix('{user}')->name('status.')->group(function () {
                Route::get('status', [UserController::class, 'editStatus'])->name('edit');
                Route::post('status', [UserController::class, 'updateStatus'])->name('update');
            });
        });

        Route::resource('indikator', IndikatorController::class)->except(['show']);
        Route::resource('survey', SurveyController::class)->except(['show']);

        Route::get('tinjauan', [TinjauanController::class, 'index'])->name('tinjauan.index');
        Route::get('tinjauan/{user}', [TinjauanController::class, 'review'])->name('tinjauan.review');
    });

    Route::middleware('redirect.unauthorize:isi_survey')->group(function () {
        Route::prefix('survey')->name('survey.')->group(function () {
            Route::get('isi', [SurveyController::class, 'viewFormSurvey'])->name('isi');
            Route::post('isi', [SurveyController::class, 'kirimSurvey'])->name('kirim');
        });
    });

    Route::get('profil', [UserSettingController::class, 'viewFormProfile'])->name('profile');
    Route::patch('profil/{user}', [UserSettingController::class, 'updateProfil'])->name('profile.update');
    Route::get('kata-sandi', [UserSettingController::class, 'viewFormPassword'])->name('password');
    Route::post('kata-sandi/{user}', [UserSettingController::class, 'updatePassword'])->name('password.update');
    Route::post('keluar', [Authentication::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('masuk', [Authentication::class, 'viewFormLogin'])->name('login');
    Route::post('masuk', [Authentication::class, 'authenticate'])->name('authenticate');
    Route::get('daftar', [Authentication::class, 'viewFormRegister'])->name('register');
    Route::post('daftar', [Authentication::class, 'register'])->name('register');
});
