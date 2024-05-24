<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProductController;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('landing');
});

// auth route
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginpost'])->name('login_post');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/registrasi', [UserController::class, 'register'])->name('registrasi');
Route::post('/registrasi', [UserController::class, 'regiteruser'])->name('registrasi_post');
Route::get('/profil', [UserController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'role:user|admin']);

// product
Route::get('/product', [ProductController::class, 'show'])->name('product');
Route::get('/product/form', [ProductController::class, 'form'])->name('product_form');
Route::post('/product/form/add', [ProductController::class, 'add'])->name('product_add');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product_edit');
Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product_update');
Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product_delete');
Route::get('/product_management', [ProductController::class, 'list'])->name('product_list');

// user

