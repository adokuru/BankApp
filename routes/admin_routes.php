<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');