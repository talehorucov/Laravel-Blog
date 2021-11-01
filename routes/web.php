<?php

use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\MainController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\MainController as FrontendMainController;
use App\Http\Controllers\Frontend\PostController as FrontendPostController;
use App\Http\Controllers\Frontend\ProfileController as FrontendProfileController;

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
            Route::get('/my', [AdminProfileController::class, 'index'])->name('profile.index');
        });
    });
});

Route::group(
    ['as' => 'user.'],
    function () {
        Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('category.index');
        Route::get('/posts', [FrontendPostController::class, 'latest_posts'])->name('post.latest');
        Route::get('/posts/all', [FrontendPostController::class, 'post_all'])->name('post.all');
        Route::get('/posts/category/{category_slug}', [FrontendPostController::class, 'index'])->name('post.index');
        Route::get('/posts/category/{category_slug}/{slug}', [FrontendPostController::class, 'show'])->name('post.show');

        Route::prefix('my/account')->group(function () {
            Route::get('/', [FrontendProfileController::class, 'index'])->name('profile.index');
            Route::get('/edit', [FrontendProfileController::class, 'edit'])->name('profile.edit');
            Route::post('/update/{user}', [FrontendProfileController::class, 'update'])->name('profile.update');
        });

        Route::prefix('comment')->group(function () {
            Route::post('/add', [CommentController::class, 'store'])->name('comment.store.ajax');
            Route::get('/edit', [FrontendProfileController::class, 'edit'])->name('profile.edit');
            Route::post('/update/{user}', [FrontendProfileController::class, 'update'])->name('profile.update');
        });
    }
);

Route::get('/', [FrontendMainController::class, 'index'])->name('user.index');
Route::get('/login', [FrontendMainController::class, 'loginForm'])->name('user.loginForm');
Route::post('/login', [FrontendMainController::class, 'login'])->name('user.login');
Route::get('/register', [FrontendMainController::class, 'registerForm'])->name('user.registerForm');
Route::post('/register', [FrontendMainController::class, 'register'])->name('user.register');
Route::get('/forgot-password', [FrontendMainController::class, 'forgot_passwordForm'])->name('user.forgot.passwordForm');
Route::post('/forgot-password', [FrontendMainController::class, 'forgot_password'])->name('user.forgot.password');
Route::get('/change-password', [FrontendMainController::class, 'change_password'])->name('user.change.forgotpassword');
Route::post('/update-password/{user}', [FrontendMainController::class, 'update_password'])->name('user.update.forgotpassword');
