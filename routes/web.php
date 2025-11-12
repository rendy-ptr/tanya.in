<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

Route::get('/', fn() => view('pages.welcome'))->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('auth.register');
    Route::post('/register', [RegisterController::class, 'store'])->name('auth.register.store');

    Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
    Route::post('/login', [LoginController::class, 'store'])->name('auth.login.store');
});

Route::middleware('authenticated')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('auth.logout');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{slug}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{slug}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{slug}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    Route::get('/questions/{slug}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    Route::put('/questions/{slug}', [QuestionController::class, 'update'])->name('questions.update');
    Route::delete('/questions/{slug}', [QuestionController::class, 'destroy'])->name('questions.destroy');

    Route::post('/questions/{slug}/answers', [App\Http\Controllers\AnswerController::class, 'store'])->name('answers.store');
    Route::get('/answers/{id}/edit', [App\Http\Controllers\AnswerController::class, 'edit'])->name('answers.edit');
    Route::put('/answers/{id}', [App\Http\Controllers\AnswerController::class, 'update'])->name('answers.update');
    Route::delete('/answers/{id}', [App\Http\Controllers\AnswerController::class, 'destroy'])->name('answers.destroy');
});
Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions/{slug}', [QuestionController::class, 'show'])->name('questions.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
