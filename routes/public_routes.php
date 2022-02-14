<?php

use App\Http\Controllers\Frontend\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'home'])->name('home');
Route::get('/about', [DashboardController::class, 'about'])->name('about');
Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');
Route::get('/faq', [DashboardController::class, 'faq'])->name('faq');
Route::get('/getting-started', [DashboardController::class, 'gettingstarted'])->name('getting-started');
Route::get('/terms-of-service', [DashboardController::class, 'termsofservice'])->name('terms-of-service');
Route::get('/help-center', [DashboardController::class, 'helpcenter'])->name('help-center');
Route::get('/features', [DashboardController::class, 'features'])->name('features');