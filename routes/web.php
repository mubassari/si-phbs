<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;

Route::get('', [MainController::class, 'beranda'])->name('beranda');
Route::resource('user', UserController::class);
Route::resource('indikator', IndikatorController::class);
Route::resource('survey', SurveyController::class);
Route::post('/user/{user}/reset-status', [UserController::class, 'resetStatus'])->name('user.reset-status');
