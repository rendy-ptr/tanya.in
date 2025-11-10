<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('pages.welcome'))->name('home');

// Route::get('/about', fn() => view('about'))->name('about');
