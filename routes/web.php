<?php

use App\Http\Controllers\PengeluaranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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
