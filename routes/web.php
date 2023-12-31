<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PortController;
use App\Http\Controllers\Backend\PerusahaanController;

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

Route::get('/', function () {
    return view('backend/login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.validasi');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');


Route::resource('/perusahaan', PerusahaanController::class)->middleware('auth');


/*
/--------------------------------------------------------------------------
/ Routes Untuk Hak Akses Admin
/--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    
    Route::resource('/user', UserController::class);
    Route::resource('/port', PortController::class);
    
});


