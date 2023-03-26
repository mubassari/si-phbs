<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Authentication;

Route::get('', [MainController::class, 'beranda'])->name('beranda');

Route::middleware(['auth'])->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('indikator', IndikatorController::class);
    Route::resource('survey', SurveyController::class);
    Route::post('/user/{user}/reset-status', [UserController::class, 'resetStatus'])->name('user.reset-status');

    Route::get('/lihat-profil', [Authentication::class, 'viewFormProfile'])->name('profile');
    Route::patch('/profil/{user}', [Authentication::class, 'updateProfil'])->name('profile.update');
    Route::post('/keluar', [Authentication::class, 'logout'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/masuk', [Authentication::class, 'viewFormLogin'])->name('login');
    Route::post('/masuk', [Authentication::class, 'authenticate'])->name('authenticate');
    Route::get('/daftar', [Authentication::class, 'viewFormRegister'])->name('register');
    Route::post('/daftar', [Authentication::class, 'register'])->name('register');
});
