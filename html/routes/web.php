<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;


//ログイン機能とか
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');//ログイン成功
Route::get('/option', [App\Http\Controllers\HomeController::class, 'option'])->name('option');//




Route::get('/customLogin', [App\Http\Controllers\CustomLoginController::class, 'showLoginForm'])->name('customLogin');
Route::post('/customLogin', [App\Http\Controllers\CustomLoginController::class, 'login']);

Route::middleware(['auth:custom'])->group(function () {
    Route::get('/customHome', [App\Http\Controllers\CustomHomeController::class, 'index'])->name('customHome');
});

//メイン部分

//Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('main');