<?php

use App\Http\Controllers\PostMenuController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/tambah-menu', [PostMenuController::class, 'showTambahMenu'])->name('tambah-menu')->middleware(isAdmin::class);

//Ini untuk route viewsnya
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');
Route::view('/menu-pesan', 'menu-pesan')->name('menu-pesan')->middleware('auth');
// Route::view('/tambah-menu', view: 'tambah-menu')->name('tambah-menu')->middleware(isAdmin::class);

//Ini endpoint routenya untuk logika bagian auth
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

//logika crud gaming
Route::post('/tambah-menu', [PostMenuController::class, 'tambahMakanan']);
Route::get('/edit-menu/{makanan}', [PostMenuController::class, 'displayEditMakanan']);
Route::put('/edit-menu/{makanan}', [PostMenuController::class, 'editMakanan']);
Route::delete('/delete-menu/{makanan}', [PostMenuController::class, 'deleteMakanan']);