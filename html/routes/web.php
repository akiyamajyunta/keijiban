<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;


//ログイン機能とか
Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');//ログイン成功
Route::get('home/option', [App\Http\Controllers\HomeController::class, 'option'])->name('option');//
Route::get('hone/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');//
Route::get('home/message', [App\Http\Controllers\HomeController::class, 'message'])->name('message');//
Route::get('home/message/direct', [App\Http\Controllers\HomeController::class, 'direct'])->name('direct');//

//Route::get('home/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('home/logout');//
Route::get('home/register', [App\Http\Controllers\HomeController::class, 'register'])->name('home.register');//



//メイン部分

//Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main');