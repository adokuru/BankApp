<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth', 'isAdmin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/account', [AccountController::class, 'index'])->name('admin.account.index');
    Route::get('/account/create', [AccountController::class, 'create'])->name('admin.account.create');
    Route::get('/account/edit/{id}', [AccountController::class, 'edit'])->name('admin.account.edit');
    Route::post('/account', [AccountController::class, 'store'])->name('admin.account.store');
    Route::get('/account/delete/{id}', [AccountController::class, 'destroy'])->name('admin.account.delete');
    Route::put('/account', [AccountController::class, 'update'])->name('admin.account.update');
});
