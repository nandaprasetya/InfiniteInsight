<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Models\Buku;
use App\Http\Controllers\KategoriController;
use App\Models\KategoriBuku;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Http\Controllers\AdminController;
use App\Models\Admin;

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
    return view('welcome');
});

// User
Route::middleware(['auth:web', 'user-access:user'])->group(function(){
    Route::resource('/buku', BukuController::class);
    Route::resource('/dashboard', UserController::class);
    Route::resource('/kategori', KategoriController::class);
    Route::get('/search', [BukuController::class, 'search'])->name('search');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

// Guest
Route::middleware(['guest'])->group(function (){
    Route::get('/register', [UserController::class, 'registerpage'])->name('registerpage');
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::get('/login', [UserController::class, 'loginpage'])->name('loginpage');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::prefix('admin')->group(function (){
        Route::get('/login', [AdminController::class, 'loginpage'])->name('admin.login.page');
        Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    });
});

// Admin
Route::prefix('admin')->group(function () {
    Route::middleware(['user-access:admin'])->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});
