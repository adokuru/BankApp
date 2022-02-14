<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/Account/Dashboard', [AccountController::class, 'home'])->name('Account_home');
Route::get('/Account/profile', [AccountController::class, 'profile'])->name('Account_profile');
Route::get('/Account/security', [AccountController::class, 'security'])->name('Account_security');
Route::get('/Account/activity', [AccountController::class, 'activity'])->name('Account_activity');