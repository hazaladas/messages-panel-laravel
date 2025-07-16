<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

/*
Route::get('/', function () {
    return view('welcome');
});

//benim eklediğim

Route::get('/hello', function () {
    return 'Merhaba Laravel!';
});
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/messages', [MessageController::class, 'index']);

?>