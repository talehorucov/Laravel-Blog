<?php

use App\Http\Controllers\Frontend\MainController;
use Illuminate\Support\Facades\Route;


Route::get('/',[MainController::class,'index'])->name('user.index');
Route::get('/login',[MainController::class,'loginForm'])->name('user.loginForm');
Route::post('/login',[MainController::class,'login'])->name('user.login');
Route::get('/register',[MainController::class,'registerForm'])->name('user.registerForm');
Route::post('/register',[MainController::class,'register'])->name('user.register');
Route::get('/forgot-password',[MainController::class,'forgot_passwordForm'])->name('user.forgot.passwordForm');
Route::post('/forgot-password',[MainController::class,'forgot_password'])->name('user.forgot.password');
Route::get('/change-password',[MainController::class,'change_password'])->name('user.change.forgotpassword');
Route::post('/update-password/{user}',[MainController::class,'update_password'])->name('user.update.forgotpassword');

Route::get('admin/index',[MainController::class,'test']);
