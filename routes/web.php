<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware('isLoggedIn')->group(function () {
    Route::get('/login', [HomeController::class, 'loginIndex'])->name('index.login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [HomeController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::middleware('IsCustomer')->group(function () {
        Route::get('admin/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::prefix('admin')->name('admin.')->group(function () {
            
            Route::group(['middleware' => 'permission:about'], function () {
                Route::get('about', [HomeController::class, 'about'])->name('about');
            });
            Route::group(['middleware' => 'permission:contact'], function () {
                Route::get('contact', [HomeController::class, 'contact'])->name('contact');
            });
            Route::group(['middleware' => 'permission:role'], function () {
                Route::get('role-permission', [HomeController::class, 'role'])->name('role');
                Route::post('role-store', [HomeController::class, 'roleStore'])->name('role-store');
            });
            Route::group(['middleware' => 'permission:staff'], function () {
                Route::get('staff-manage', [HomeController::class, 'staff'])->name('staff');
                Route::post('staff-store', [HomeController::class, 'staffStore'])->name('staff-store');
            });
        });
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
