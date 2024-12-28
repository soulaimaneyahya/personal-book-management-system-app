<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::resource('books', \App\Http\Controllers\Books\BookController::class);
Route::resource('categories', \App\Http\Controllers\Categories\CategoryController::class);
Route::resource('authors', \App\Http\Controllers\Authors\AuthorController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('index');
});

\Illuminate\Support\Facades\Auth::routes([
    'login' => true,
    'register' => true,
    'logout' => true,
    'reset' => false,
    'confirm' => false,
]);

/**
 * Laravel socialite
 * Auth using GitHub
 */
Route::prefix('auth/github')->group(function () {
    Route::get('/redirect', function () {
        return Socialite::driver('github')->redirect();
    });

    Route::get('/callback', function () {
        $user = Socialite::driver('github')->user();
        dd($user);
    });
});
