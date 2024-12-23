<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

//Ini untuk route viewsnya
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
Route::view('/menu-pesan', 'menu-pesan')->name('menu-pesan');

//Ini endpoint routenya untuk logika
Route::post('/register', [UserController::class, 'register']);