<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // コメント
    public function store(Request $request)
    {

        if (!Auth::check()) {
            $message = 'ログインしていません。ログインするか新規登録してください';
            return view('auth.newpage', ['message' => $message]);
        }

        $userId =  $request->input('user_id');
        $validator = Validator::make(
            $request->all(),
            [

                'tweet_id' => ['required', 'exists:tweets,id'],
                'comment' => ['required', 'max:140'],

            ],
            [
                'comment.required' => 'コメントを入力してください',
                'comment.max'      => '140文字以内にしてください',
            ]
        );

        if ($validator->fails()) {

            $allErrors = $validator->errors()->all();

            return back()
                ->withErrors(['message' => $allErrors])
                ->withInput();
        }

        $data = $request->only('tweet_id', 'comment', 'created_at');
        $data['user_id'] =  Auth::id();
        $data['name']    = Auth::user()->name;

        Comment::create($data);

        $previousUrl = url()->previous();

        if (Str::contains($previousUrl, 'home/profile')) {

            return  redirect()->route('profile', ['user_id' =>  $userId]);
        } else {

            return redirect()->back();
        };
    }

    public function delete(Request $request)
    {

        $commentId = $request->input('id');
        $comment = Comment::findOrFail($commentId);

        if (Auth::id() !== $comment->user_id) {
            redirect()->back();;
        }

        $comment->delete();

        return redirect()->back();
    }
}
