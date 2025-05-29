<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// TODO: Import controller MahasiswaController
use App\Http\Controllers\Api\MahasiswaController;


// TODO: Buat route untuk menangani request
/*    - Rute-rute terkait CRUD mahasiswa:
 *        - GET     `/mahasiswa`      → `MahasiswaController method:index`
 *        - POST    `/mahasiswa`      → `MahasiswaController method:store`
 *        - GET     `/mahasiswa/{id}` → `MahasiswaController method:show`
 *        - PUT     `/mahasiswa/{id}` → `MahasiswaController method:update`
 *        - DELETE  `/mahasiswa/{id}` → `MahasiswaController method:destroy`
 */

Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show']);
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);