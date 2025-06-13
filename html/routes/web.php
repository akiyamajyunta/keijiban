<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\TimelineController;
use App\Http\Controllers\Models\Tweet;

use Illuminate\Support\Facades\Auth;


//ログインしていない時のルート
Route::get('/', function () {
    return view('auth/newpage');})->name('newPage');


// ダッシュボードのルート（ログインが必要）
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware('auth')->name('dashboard');


// ユーザー登録のルート
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// ->middleware('guest');
Route::post('register', [RegisterController::class, 'register']);


// ログインのルート
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);


// ログアウトのルート
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');//postの前にgetを追加するとエラーが治る
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');


// コンテンツのルート();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');//ログイン成功、メインの画面

Route::get('home/option', [App\Http\Controllers\HomeController::class, 'option'])->name('option');//
Route::get('hone/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');//
Route::get('hone/UserSearch', [App\Http\Controllers\HomeController::class, 'UserSearch'])->name('UserSearch');//ユーザー検索

Route::get('hone/OtherProfile', [App\Http\Controllers\HomeController::class, 'OtherProfile'])->name('OtherProfile');//他人のプロフィール

Route::get('home/message', [App\Http\Controllers\HomeController::class, 'message'])->name('message');//DMの相手をさがす
Route::get('home/message/direct', [App\Http\Controllers\HomeController::class, 'direct'])->name('direct');//DMのないよう

//Route::get('home/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('home/logout');//
Route::get('home/register', [App\Http\Controllers\HomeController::class, 'register'])->name('home.register');//



//tweet,comment,DMなど

//tweet
Route::get('/tweet', [App\Http\Controllers\TimelineController::class , 'store'])->name('tweet.store');
Route::post('/tweet', [App\Http\Controllers\TimelineController::class , 'store'])->name('tweet.store');

