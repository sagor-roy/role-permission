<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware('isLoggedIn')->group(function () {
    Route::get('/login', [HomeController::class, 'loginIndex'])->name('index.login');
    Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/auth/github', [AuthController::class, 'redirectToGithub'])->name('login.github');
    Route::get('/auth/facebook', [AuthController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('/callback/github', [AuthController::class, 'handleCallbackGithub']);
    Route::get('/callback/facebook', [AuthController::class, 'handleCallbackFacebook']);
    Route::get('/callback/google', [AuthController::class, 'handleCallback']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [HomeController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('register.store');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/student-data', [HomeController::class, 'studentData'])->name('student.data');
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
            Route::get('credential',[HomeController::class,'credentIndex'])->name('credential');
        });
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
