<?php

use App\Http\Controllers\Frontend\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/about', [DashboardController::class, 'about'])->name('about');
Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');
Route::get('/faq', [DashboardController::class, 'FAQ'])->name('faq');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', [DashboardController::class, 'about'])->name('about');