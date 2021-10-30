<?php

use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\MainController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Frontend\MainController as UserMainController;

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('/login', [MainController::class, 'loginForm'])->name('loginForm');
    Route::post('/login', [MainController::class, 'login'])->name('login');

    Route::group(['middleware' => 'IsAdmin'], function () {
        //////////////////////////////// Main
        Route::get('/index', [MainController::class, 'index'])->name('index');
        Route::get('/logout', [MainController::class, 'logout'])->name('logout');

        //////////////////////////////// User
        Route::resource('users', UserController::class)->except('store', 'create', 'destroy');
        Route::get('/delete/user/{user}', [UserController::class, 'destroy'])->name('users.destroy');

        //////////////////////////////// Category
        Route::resource('categories', CategoryController::class)->except('destroy')->parameters([
            'categories' => 'category:slug',
        ]);
        Route::get('/delete/category/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        //////////////////////////////// Post
        Route::get('/inactive/posts/{post}', [PostController::class, 'inactive'])->name('posts.inactive');
        Route::get('/active/posts/{post}', [PostController::class, 'active'])->name('posts.active');
        Route::resource('posts', PostController::class)->except('destroy')->parameters([
            'posts' => 'post:slug',
        ]);
        Route::get('/delete/post/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

        //////////////////////////////// Tag
        Route::resource('tags', TagController::class)->except('show', 'destroy')->parameters([
            'tags' => 'tag:slug',
        ]);;
        Route::get('/delete/tag/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');
        
        //////////////////////////////// Admin Profile
        Route::prefix('profile')->group(function () {
            Route::get('/my',[AdminProfileController::class,'index'])->name('profile.index');
        });
    });
});


Route::get('/', [UserMainController::class, 'index'])->name('user.index');
Route::get('/login', [UserMainController::class, 'loginForm'])->name('user.loginForm');
Route::post('/login', [UserMainController::class, 'login'])->name('user.login');
Route::get('/register', [UserMainController::class, 'registerForm'])->name('user.registerForm');
Route::post('/register', [UserMainController::class, 'register'])->name('user.register');
Route::get('/forgot-password', [UserMainController::class, 'forgot_passwordForm'])->name('user.forgot.passwordForm');
Route::post('/forgot-password', [UserMainController::class, 'forgot_password'])->name('user.forgot.password');
Route::get('/change-password', [UserMainController::class, 'change_password'])->name('user.change.forgotpassword');
Route::post('/update-password/{user}', [UserMainController::class, 'update_password'])->name('user.update.forgotpassword');
