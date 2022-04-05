<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');
Route::middleware('isLoggedIn')->group(function () {
    Route::controller(HomeController::class)->group(function(){
        Route::get('login', 'loginIndex')->name('index.login');
        Route::get('register', 'register')->name('register');
    });
    Route::controller(AuthController::class)->group(function(){
        Route::get('auth/google','redirectToGoogle')->name('login.google');
        Route::get('auth/github','redirectToGithub')->name('login.github');
        Route::get('auth/facebook','redirectToFacebook')->name('login.facebook');
        Route::get('callback/github','handleCallbackGithub');
        Route::get('callback/facebook','handleCallbackFacebook');
        Route::get('callback/google','handleCallback');
        Route::post('login','login')->name('login');
        Route::post('register','store')->name('register.store');
    });
});
Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::controller(HomeController::class)->group(function(){
        Route::get('profile', 'profile')->name('profile');
        Route::get('student-data', 'studentData')->name('student.data');
        Route::middleware('IsCustomer')->group(function () {
            Route::get('admin/dashboard', 'dashboard')->name('dashboard');
            Route::prefix('admin')->name('admin.')->group(function () {
                Route::group(['middleware' => 'permission:about'], function () {
                    Route::get('about', 'about')->name('about');
                });
                Route::group(['middleware' => 'permission:contact'], function () {
                    Route::get('contact', 'contact')->name('contact');
                });
                Route::group(['middleware' => 'permission:role'], function () {
                    Route::get('role-permission', 'role')->name('role');
                    Route::post('role-store', 'roleStore')->name('role-store');
                });
                Route::group(['middleware' => 'permission:staff'], function () {
                    Route::get('staff-manage', 'staff')->name('staff');
                    Route::post('staff-store', 'staffStore')->name('staff-store');
                });
                Route::get('credential',[HomeController::class,'credentIndex'])->name('credential');
            });
        });
    });
});
