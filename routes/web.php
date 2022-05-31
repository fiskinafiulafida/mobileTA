<?php

use App\Http\Controllers\PengeluaranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\PemasukanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// // Login 
Route::get('/loginAdmin', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/loginAdmin', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// register
Route::get('/registerAdmin', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/registerAdmin', [RegisterController::class, 'store']);

// dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// pengeluaran
Route::get('/pengeluaran', [PengeluaranController::class, 'index']);
Route::get('/pengeluaran/create', [PengeluaranController::class, 'create']);
Route::post('/pengeluaran', [PengeluaranController::class, 'store']);

//admin
Route::get('/adminUser', [AdminController::class, 'index']);
Route::get('/adminUser/{id}/edit', [AdminController::class, 'edit']);
Route::put('/adminUser/{id}', [AdminController::class, 'update']);
Route::delete('/adminUser/{id}', [AdminController::class, 'destroy']);

//pengunjung
Route::get('/pengunjung', [PengunjungController::class, 'index']);
Route::get('/pengunjung/{id}/edit', [PengunjungController::class, 'edit']);
Route::put('/pengunjung/{id}', [PengunjungController::class, 'update']);
Route::delete('/pengunjung/{id}', [PengunjungController::class, 'destroy']);

//pemasukan
Route::get('/pemasukan', [PemasukanController::class, 'index']);
