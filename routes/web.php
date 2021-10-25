<?php

use App\Http\Controllers\Frontend\MainController;
use Illuminate\Support\Facades\Route;


Route::get('/',[MainController::class,'index'])->name('user.index');
