<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('pages.welcome'))->name('home');

Route::prefix('auth')->group(function () {
    Route::get('/register', fn() => view('pages.auth.register'))->name('auth.register');
    Route::get('/login', fn() => view('pages.auth.login'))->name('auth.login');
});
