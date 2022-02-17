<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum', 'verified','2fa']], function () {
    Route::get('/account/dashboard', [AccountController::class, 'home'])->name('Account_home');
    Route::get('/account/profile', [AccountController::class, 'profile'])->name('Account_profile');
    Route::get('/account/security', [AccountController::class, 'security'])->name('Account_security');
    Route::get('/account/activity', [AccountController::class, 'activity'])->name('Account_activity');
    Route::get('/account/deposit', [AccountController::class, 'deposit'])->name('Account_deposit');
    Route::get('/account/transfers', [AccountController::class, 'transfers'])->name('Account_transfers');
    Route::get('/account/transactions', [AccountController::class, 'transactions'])->name('Account_transactions');
});

Route::get('/account/2fa', [AccountController::class, 'twofa'])->name('Account_2fa');