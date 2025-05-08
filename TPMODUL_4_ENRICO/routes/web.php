<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// 1. Tambahkan route untuk menampilkan daftar pengguna
Route::get('/users/index', [UserController::class, 'index'])->name('users.index');

// 2. Tambahkan route untuk menampilkan form tambah pengguna
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// 3. Tambahkan route untuk menyimpan pengguna baru
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// 4. Tambahkan route untuk menampilkan form edit pengguna
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

// 5. Tambahkan route untuk menyimpan perubahan pengguna
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// 6. Tambahkan route untuk menghapus pengguna
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');