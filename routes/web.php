<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

\Illuminate\Support\Facades\Auth::routes([
    'login' => true,
    'register' => true,
    'logout' => true,
    'reset' => false,
    'confirm' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('index');
});

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
