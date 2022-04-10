<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth', 'isAdmin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/contact', [ContactController::class, 'index'])->name('admin.contact.index');
    Route::get('/contact/{id}', [ContactController::class, 'show'])->name('admin.contact.show');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'updateAccount'])->name('admin.profile.update');
    Route::get('/account', [AccountController::class, 'index'])->name('admin.account.index');
    Route::get('/account/create', [AccountController::class, 'create'])->name('admin.account.create');
    Route::get('/account/edit/{id}', [AccountController::class, 'edit'])->name('admin.account.edit');
    Route::get('/account/credit/{id}', [AccountController::class, 'credit'])->name('admin.account.credit');
    Route::post('/account/credit}', [AccountController::class, 'addcredit'])->name('admin.account.addcredit');
    Route::get('/account/debit/{id}', [AccountController::class, 'debit'])->name('admin.account.debit');
    Route::post('/account/debit}', [AccountController::class, 'adddebit'])->name('admin.account.adddebit');

    Route::post('/account', [AccountController::class, 'store'])->name('admin.account.store');
    Route::get('/account/delete/{id}', [AccountController::class, 'destroy'])->name('admin.account.delete');
    Route::put('/account', [AccountController::class, 'update'])->name('admin.account.update');


    Route::get('/account/codes/{id}', [AccountController::class, 'codes'])->name('admin.account.codes');
    Route::get('/account/ViewCodes/{id}', [AccountController::class, 'ViewCodes'])->name('admin.account.ViewCodes');
    Route::post('/account/codes', [AccountController::class, 'addcodes'])->name('admin.account.addcodes');
    Route::get('/transfer/approve/{id}', [AccountController::class, 'approve'])->name('admin.account.approve');
    Route::get('/transfer/reject/{id}',  [AccountController::class, 'reject'])->name('admin.account.reject');
    Route::get('/transfers', [AccountController::class, 'admin_transfers'])->name('admin.transfer.index');
    Route::get('/account/disable/{id}', [AccountController::class, 'disable'])->name('admin.account.disable');
    Route::get('/account/enable/{id}', [AccountController::class, 'enableTransfer'])->name('admin.account.enableTransfer');
    Route::get('/account/disbleCodes/{id}', [AccountController::class, 'disableCodes'])->name('admin.account.disbleCodes');
    Route::get('/account/enableCodes/{id}', [AccountController::class, 'enableCodes'])->name('admin.account.enableCodes');
});
