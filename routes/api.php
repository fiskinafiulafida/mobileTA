<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengeluaranApiController;
use App\Http\Controllers\PemasukanApiController;
use App\Http\Controllers\KatPengeluaranApiController;
use App\Http\Controllers\KatPemasukanApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth/register', [AuthController::class, 'register']);
Route::get('/auth/register', [AuthController::class, 'index']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/pengeluaran', [PengeluaranApiController::class, 'index']);
Route::post('/pengeluaran', [PengeluaranApiController::class, 'store']);

Route::get('/pemasukan', [PemasukanApiController::class, 'index']);
Route::post('/pemasukan', [PemasukanApiController::class, 'store']);

Route::get('/kategoriPengeluaran', [KatPengeluaranApiController::class, 'index']);
Route::post('/kategoriPengeluaran', [KatPengeluaranApiController::class, 'store']);

Route::get('/kategoriPemasukan', [KatPemasukanApiController::class, 'index']);
Route::post('/kategoriPemasukan', [KatPemasukanApiController::class, 'store']);

