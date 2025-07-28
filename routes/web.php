<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserRegisterController;

Route::get('/', function () {
    return view('home');
});

Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');

Route::post('/messages/{id}/toggle-read', [MessageController::class, 'toggleRead'])
    ->name('messages.toggleRead');

Route::get('/messages/{id}', [MessageController::class, 'show'])->name('message.show');

Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');

Route::post('/login', [UserAuthController::class, 'login'])->name('user.login');

Route::get('/logout', [UserAuthController::class, 'logout'])->name('user.logout');

Route::get('/register',[UserRegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register',[UserRegisterController::class, 'register'])-> name('register');
?>