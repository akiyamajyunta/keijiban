<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $talk = $request->input('talk');

        if(empty($talk)){

        $talk = '';

        }


        $user = Auth::user();
        // フォローしているユーザーのIDを取得
        /** @var \App\Models\User $user */
        $followingIds = $user->followings()->pluck('followed_id')->toArray();

        // 自分のツイートも含めるために、自分のIDを追加
        $followingIds[] = $user->id;

        // フォローしているユーザー＋自分のツイートを最新順（降順）に取得
        $tweets = Tweet::whereIn('user_id', $followingIds)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('main/home', compact('tweets', 'talk'));
    }
    //option の表示
    public function option()
    {
        $user_id = Auth::id();
        $users = User::where('id', $user_id)->get();
        return view('main/option', compact('users'));
    }

    public function profile(Request $request)
    {
        $user_id = Auth::id();
        $tweet_user_Id = $request->input('user_id');

        if (empty($tweet_user_Id)) {
            $users = User::where('id', $user_id)->get();
            $tweets = Tweet::where('user_id', $user_id)->get();
            return view('main/profile', compact('users', 'tweets'));
        }
        if ($tweet_user_Id != $user_id) {
            $users = User::where('id', $tweet_user_Id)->get();
            $tweets = Tweet::where('user_id', $tweet_user_Id)->get();
            return view('main/profile', compact('users', 'tweets'));
        }
        $users = User::where('id', $user_id)->get();
        $tweets = Tweet::where('user_id', $user_id)->get();
        return view('main/profile', compact('users', 'tweets'));
    }


    public function message()
    {
        return view('main/message');
    }

    // public function UserSearch()
    // {
    //     return view('UserSearch');
    // }

    // public function OtherProfile()
    // {
    //     return view('OtherProfile');
    // }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if (!empty($search)) {
            //検索
            $tweets = Tweet::where('content', 'LIKE', "%{$search}%")->get();
        } else {

            $tweets = Tweet::all();
        }

        return view('main/search', compact('tweets'));
    }
}
