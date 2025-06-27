<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;


//ログインしていない時のルート
    Route::get('/', function () {
        
        return view('auth/newpage');})->name('newPage');

    // ユーザー新規登録のルート
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('showRegistrationForm');
    // ユーザー新規登録
    Route::post('register', [RegisterController::class,'register'])->name('register');


    // ログインフォームへ行くルート
    Route::get('showlogin', [LoginController::class, 'showLoginForm'])->name('showlogin');

    // ログインの処理
    Route::post('login', [LoginController::class, 'login'])->name('login');


    // ログインしてたらこう
    Route::middleware('auth')->group(function () {

    //プロフィールの変更　reProfile

    Route::post('/tweet/reProfile', [RegisterController::class,'reProfile'])->name('reProfile');

    //名前の変更
    Route::post('/tweet/rename', [RegisterController::class,'rename'])->name('rename');

    //パスワードの変更
    Route::post('/tweet/rePassword',  [RegisterController::class,'rePassword'])->name('rePassword');

    //ユーザーIDの変更
    Route::post('/tweet/reUserId', [RegisterController::class,'reUserId'])->name('reUserId');

    // ログアウトのルート
    Route::post('logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');
    // コンテンツのルート、遷移用;

    // ヘッダーにあるアイコンの選択肢共

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');//ログイン成功、メインの画面
    Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');//ログイン成功、メインの画面

    

    Route::get('home/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');//検索
    Route::get('home/option', [App\Http\Controllers\HomeController::class, 'option'])->name('option');//オプション
    Route::get('home/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');//プロフィール
//tweet,comment,DMなど
    //tweet
    Route::post('/tweet', [App\Http\Controllers\TimelineController::class,'store'])->name('tweet.store');

    //tweetの自動生成,コミュ強太郎
    Route::post('/make/tweet', [App\Http\Controllers\TimelineController::class,'make'])->name('tweet.make');


    //tweetの削除
    Route::post('/tweet/delete', [App\Http\Controllers\TimelineController::class ,'delete'])->name('tweet.delete');

    //コメント
    Route::post('/comment', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

    //コメントの削除
    Route::post('/comment/delete', [App\Http\Controllers\CommentController::class, 'delete'])->name('comment.delete');


     // DM の一覧ページ（受信相手）
    Route::get('home/contact', [App\Http\Controllers\DirectMessageController::class, 'contact'])->name('contact');
    // DM の一覧ページ（会話履歴）
    Route::get('/direct-messages', [App\Http\Controllers\DirectMessageController::class, 'index'])->name('directMessages');

    // DM の投稿処理
    Route::post('/direct-messages', [App\Http\Controllers\DirectMessageController::class, 'store'])->name('directMessages.store');

    Route::get('/follow', [App\Http\Controllers\FollowController::class, 'follow'])->name('follow');
    Route::get('/unfollow', [App\Http\Controllers\FollowController::class, 'unfollow'])->name('unfollow');

});


