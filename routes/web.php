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
            Route::prefix('{user}')->group(function () {
                Route::post('status', [UserController::class, 'updateStatus'])->name('status.update');
                Route::post('verify', [UserController::class, 'verify'])->name('verify');
            });
        });
        Route::post('user/{user}/status', [UserController::class, 'updateStatus'])->name('user.status.update');

        Route::resource('indikator', IndikatorController::class)->except(['show']);
        Route::resource('survey', SurveyController::class)->except(['show']);

        Route::get('tinjauan', [TinjauanController::class, 'index'])->name('tinjauan.index');
        Route::get('tinjauan/{user}', [TinjauanController::class, 'review'])->name('tinjauan.review');
    });

    Route::prefix('survey')->name('survey.')->group(function () {
        Route::get('saya', [SurveyController::class, 'viewSurveySaya'])->middleware('redirect.unauthorize:tampil_survey')->name('saya');
        Route::prefix('isi')->middleware('redirect.unauthorize:isi_survey')->group(function () {
            Route::get('', [SurveyController::class, 'viewFormSurvey'])->name('isi');
            Route::post('', [SurveyController::class, 'kirimSurvey'])->name('kirim');
        });
    });

    Route::prefix('profil')->name('profile.')->group(function () {
        Route::get('', [UserSettingController::class, 'viewFormProfile'])->name('detail');
        Route::prefix('{user}')->group(function () {
            Route::patch('', [UserSettingController::class, 'updateProfil'])->name('update');
            Route::patch('sandi', [UserSettingController::class, 'updatePassword'])->name('password');
        });
    });
    Route::post('keluar', [Authentication::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('masuk', [Authentication::class, 'viewFormLogin'])->name('login');
    Route::post('masuk', [Authentication::class, 'authenticate'])->name('authenticate');
    Route::get('daftar', [Authentication::class, 'viewFormRegister'])->name('register');
    Route::post('daftar', [Authentication::class, 'register'])->name('register');
});
