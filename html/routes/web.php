<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DirectMessageController;


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



//名前の変更
Route::get('/tweet/rename', [RegisterController::class,'rename'])->name('rename');
Route::post('/tweet/rename', [RegisterController::class,'rename'])->name('rename');

//プロフィールの変更　reProfile

Route::get('/tweet/reProfile', [RegisterController::class,'reProfile'])->name('reProfile');
Route::post('/tweet/reProfile', [RegisterController::class,'reProfile'])->name('reProfile');

//パスワードの変更
// Route::get('/tweet/rePassword',  [RegisterController::class,'rePassword'])->name('rePassword');
// Route::post('/tweet/rePassword',  [RegisterController::class,'rePassword'])->name('rePassword');
Route::get('/tweet/rePassword',  [RegisterController::class,'rePassword'])->name('rePassword');


//ユーザーIDの変更
Route::get('/tweet/reUserId',  [RegisterController::class,'reUserId'])->name('reUserId');
Route::post('/tweet/reUserId', [RegisterController::class,'reUserId'])->name('reUserId');


// ログインのルート
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);


// ログアウトのルート
Route::get('logout', [LogoutController::class, 'logout'])->name('logout');//postの前にgetを追加するとエラーが治る
Route::post('logout', [LogoutController::class, 'logout'])->name('logout');


// コンテンツのルート、遷移用;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');//ログイン成功、メインの画面

// search検索

Route::get('home/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');//検索

Route::get('home/option', [App\Http\Controllers\HomeController::class, 'option'])->name('option');//オプション

Route::get('home/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');//プロフィール
Route::post('home/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');//プロフィール


Route::get('home/UserSearch', [App\Http\Controllers\HomeController::class, 'UserSearch'])->name('UserSearch');//ユーザー検索

Route::get('home/OtherProfile', [App\Http\Controllers\HomeController::class, 'OtherProfile'])->name('OtherProfile');//他人のプロフィール

//Route::get('home/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('home/logout');//
Route::get('home/register', [App\Http\Controllers\HomeController::class, 'register'])->name('home.register');//



//tweet,comment,DMなど

//tweet
Route::get('/tweet', [App\Http\Controllers\TimelineController::class,'store'])->name('tweet.store');
Route::post('/tweet', [App\Http\Controllers\TimelineController::class,'store'])->name('tweet.store');

//tweetの削除
Route::get('/tweet/delete', [App\Http\Controllers\TimelineController::class ,'delete'])->name('tweet.delete');
Route::post('/tweet/delete', [App\Http\Controllers\TimelineController::class ,'delete'])->name('tweet.delete');

//コメント
Route::get('/comment', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
Route::post('/comment', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
//コメントの削除
Route::get('/comment/delete', [App\Http\Controllers\CommentController::class, 'delete'])->name('comment.delete');
Route::post('/comment/delete', [App\Http\Controllers\CommentController::class, 'delete'])->name('comment.delete');

//ダイレクトメッセージ

    //DMの相手をさがす
    Route::get('home/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
    //DMのないよう
    // Route::get('home/message', [App\Http\Controllers\HomeController::class, 'message'])->name('message');

    //メッセージの表示
    Route::get('/home/messages', [DirectMessageController::class,'index'])->name('directMessages');
    
    // 新規メッセージ送信
    Route::post('/home/post/messages', [DirectMessageController::class,'store'])->name('postMessage');

