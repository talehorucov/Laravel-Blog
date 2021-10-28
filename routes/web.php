<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\MainController;
use App\Http\Controllers\Frontend\MainController as UserMainController;

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('/login', [MainController::class, 'loginForm'])->name('loginForm');
    Route::post('/login', [MainController::class, 'login'])->name('login');

    Route::group(['middleware' => 'IsAdmin'], function () {
        Route::get('/index', [MainController::class, 'index'])->name('index');
        Route::get('/logout',[MainController::class, 'logout'])->name('logout');
        
        Route::resource('users', UserController::class)->except('store','create','destroy');
        Route::get('/delete/user/{user}',[UserController::class, 'destroy'])->name('user.dest');
    });
});


Route::get('/', [UserMainController::class, 'index'])->name('user.index');
Route::get('/login', [UserMainController::class, 'loginForm'])->name('user.loginForm');
Route::post('/login', [UserMainController::class, 'login'])->name('user.losgin');
Route::get('/register', [UserMainController::class, 'registerForm'])->name('user.registerForm');
Route::post('/register', [UserMainController::class, 'register'])->name('user.register');
Route::get('/forgot-password', [UserMainController::class, 'forgot_passwordForm'])->name('user.forgot.passwordForm');
Route::post('/forgot-password', [UserMainController::class, 'forgot_password'])->name('user.forgot.password');
Route::get('/change-password', [UserMainController::class, 'change_password'])->name('user.change.forgotpassword');
Route::post('/update-password/{user}', [UserMainController::class, 'update_password'])->name('user.update.forgotpassword');
