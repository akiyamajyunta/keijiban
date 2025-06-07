<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/customLogin', [App\Http\Controllers\CustomLoginController::class, 'showLoginForm'])->name('customLogin');
Route::post('/customLogin', [App\Http\Controllers\CustomLoginController::class, 'login']);

Route::middleware(['auth:custom'])->group(function () {
    Route::get('/customHome', [App\Http\Controllers\CustomHomeController::class, 'index'])->name('customHome');
});
