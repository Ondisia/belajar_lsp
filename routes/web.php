<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\BeritaController;

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

Route::get('/', [BeritaController::class, 'welcome']);
Route::get('/home', [BeritaController::class, 'home']);
Route::get('/about', [BeritaController::class, 'about']);

Route::resource('berita', BeritaController::class);

Route::get('/login', [PenulisController::class, 'index']);

Route::post('login', [PenulisController::class, 'login'])->name('login');
Route::get('logout', [PenulisController::class, 'logout'])->name('logout');
