<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoansController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('/account/dashboard', [AccountController::class, 'home'])->name('Account_home');
    Route::get('/account/profile', [AccountController::class, 'profile'])->name('Account_profile');
    Route::get('/account/security', [AccountController::class, 'security'])->name('Account_security');
    Route::get('/account/activity', [AccountController::class, 'activity'])->name('Account_activity');
    Route::get('/account/deposit', [AccountController::class, 'deposit'])->name('Account_deposit');
    Route::get('/account/transfers', [AccountController::class, 'transfers'])->name('Account_transfers');
    Route::get('/account/loans', [AccountController::class, 'loans'])->name('Account_loans');
    Route::get('/account/loans/add', [AccountController::class, 'loans_add'])->name('Account_loans_add');
    Route::get('/account/transactions', [AccountController::class, 'transactions'])->name('Account_transactions');
    Route::get('/account/debit}', [AccountController::class, 'debits'])->name('account.debits');

    Route::get('/account/transfers/new', [AccountController::class, 'new_transfers'])->name('Account_transfers_new');
    Route::post('/account/transfers/new', [AccountController::class, 'Addtransfer'])->name('Addtransfer');
    Route::post('/account/transfers/otp1', [AccountController::class, 'otp1'])->name('transferOTP1');
    Route::post('/account/transfers/otp2', [AccountController::class, 'otp2'])->name('transferOTP2');
    Route::post('/account/transfers/otp3', [AccountController::class, 'otp3'])->name('transferOTP3');
    Route::post('/account/transfers/emailotp', [AccountController::class, 'emailotp'])->name('emailotp');
    Route::get('/account/transfers/confirm/{id}', [AccountController::class, 'transferConfirm'])->name('users.transfer.confirm');
    Route::Post('account/photo', [ProfileController::class, 'updatePhoto'])->name('updatePhoto');

    Route::post('loans/add/step-1',[LoansController::class, 'step1'])->name('loans.step1');

    Route::post('loans/add/step-2',[LoansController::class, 'step2'])->name('loans.step2');

    Route::post('loans/add/step-3',[LoansController::class, 'step3'])->name('loans.step3');

    Route::post('loans/{id}',[LoansController::class, 'show'])->name('loan.single');
});
