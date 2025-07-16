<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('home');
});

Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');

Route::post('/messages/{id}/toggle-read', [MessageController::class, 'toggleRead'])
    ->name('messages.toggleRead');
?>