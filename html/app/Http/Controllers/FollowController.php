<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class FollowController extends Controller
{
        public function follow(Request $request)
    {
        $user = Auth::user();
        $id = $request->input('follow_id');

        // すでにフォロー済みでなければフォローする
        if (!$user->followings()->where('followed_id', $id)->exists()) {
            $user->followings()->attach($id);
        }
            // return back();
            return redirect()->route('profile',['user_id' =>  $id]);
    }
// profile
    // アンフォローする処理（必要な場合）
    public function unfollow(Request $request)
    {
        $user = Auth::user();
        $id = $request->input('un_follow_id');

        $user->followings()->detach($id);
            // return back();
            return redirect()->route('profile',['user_id' =>  $id]);
    }

}
