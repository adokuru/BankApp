<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/account/dashboard', [AccountController::class, 'home'])->name('Account_home');
    Route::get('/account/profile', [AccountController::class, 'profile'])->name('Account_profile');
    Route::get('/account/security', [AccountController::class, 'security'])->name('Account_security');
    Route::get('/account/activity', [AccountController::class, 'activity'])->name('Account_activity');
});
