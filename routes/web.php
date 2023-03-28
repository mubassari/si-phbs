<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Authentication;
use App\Http\Controllers\UserSettingController;

Route::get('', [MainController::class, 'beranda'])->name('beranda');

Route::middleware(['auth'])->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('indikator', IndikatorController::class);
    Route::resource('survey', SurveyController::class);
    Route::get('/user/{user}/edit-status', [UserController::class, 'editStatus'])->name('user.edit-status');
    Route::post('/user/{user}/update-status', [UserController::class, 'updateStatus'])->name('user.update-status');

    Route::get('/lihat-profil', [UserSettingController::class, 'viewFormProfile'])->name('profile');
    Route::patch('/profil/{user}', [UserSettingController::class, 'updateProfil'])->name('profile.update');

    Route::get('/kata-sandi', [UserSettingController::class, 'viewFormPassword'])->name('password');
    Route::post('/kata-sandi/{user}', [UserSettingController::class, 'updatePassword'])->name('password.update');


    Route::post('/keluar', [Authentication::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/masuk', [Authentication::class, 'viewFormLogin'])->name('login');
    Route::post('/masuk', [Authentication::class, 'authenticate'])->name('authenticate');
    Route::get('/daftar', [Authentication::class, 'viewFormRegister'])->name('register');
    Route::post('/daftar', [Authentication::class, 'register'])->name('register');
});
