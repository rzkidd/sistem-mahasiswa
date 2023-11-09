<?php

use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MahasiswaController::class, 'index'])->name('index_mahasiswa');
Route::get('/admin', [MahasiswaController::class, 'admin_index'])->name('admin');
Route::get('/admin/tambah-mahasiswa', [MahasiswaController::class, 'create'])->name('tambah_mahasiswa');
Route::get('/admin/edit-mahasiswa/{mahasiswa}', [MahasiswaController::class, 'edit'])->name('edit_mahasiswa');
Route::delete('/admin/delete-mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('delete_mahasiswa');

Route::post('/admin/store-mahasiswa', [MahasiswaController::class, 'store'])->name('store_mahasiswa');
Route::post('/admin/update-mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update'])->name('update_mahasiswa');
