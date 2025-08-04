<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\UserMessageController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');

Route::post('/messages/{id}/toggle-read', [MessageController::class, 'toggleRead'])
    ->name('messages.toggleRead');

Route::get('/messages/{id}', [MessageController::class, 'show'])->name('message.show');

Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');

Route::post('/login', [UserAuthController::class, 'login'])->name('user.login');

Route::get('/logout', [UserAuthController::class, 'logout'])->name('user.logout');

Route::get('/register',[UserRegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register',[UserRegisterController::class, 'register'])-> name('register');

Route::get('/user/dashboard', function(){
    return view('user.dashboard');
})->middleware('auth')->name('user.dashboard');

Route::post('/user/send-message', [UserMessageController::class, 'store'])->middleware('auth')->name('user.message.send');

Route::middleware('auth', 'admin')->group((function(){
    Route::get('/admin/dashboard',[MessageController::class, 'index'])->name('admin.dashboard');
    
}));

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
?>