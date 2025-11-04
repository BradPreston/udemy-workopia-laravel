<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Jobs routes
// Route::resource('/jobs', JobController::class);
Route::resource('/jobs', JobController::class)->middleware('auth')->only(['create', 'edit', 'update', 'destroy']);
Route::resource('/jobs', JobController::class)->except(['create', 'edit', 'update', 'destroy']);

// Auth routes
Route::middleware('guest')->group(function() {
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/store', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Profile routes
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
