<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisterController;

Route::get('/', fn() => view('pages.welcome'))->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');
    Route::post('/register', [RegisterController::class, 'store'])->name('auth.register.store');

    Route::get('/login', fn() => view('pages.auth.login'))->name('auth.login');
});
