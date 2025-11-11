<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ProfileController;

Route::get('/', fn() => view('pages.welcome'))->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');
    Route::post('/register', [RegisterController::class, 'store'])->name('auth.register.store');

    Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'store'])->name('auth.login.store');
});

Route::middleware('guest.auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('auth.logout');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});

Route::prefix('questions')->name('questions.')->group(function () {
    Route::get('/', [QuestionController::class, 'index'])->name('index');
    Route::get('/{slug}', [QuestionController::class, 'show'])->name('show');
    // Route::get('/{question}', [App\Http\Controllers\QuestionController::class, 'show'])->name('show');
    // Route::get('/create', [App\Http\Controllers\QuestionController::class, 'create'])->name('create')->middleware('auth');
    // Route::post('/', [App\Http\Controllers\QuestionController::class, 'store'])->name('store')->middleware('auth');
});
