<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;


class CommentController extends Controller
{
    //

    public function store(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'tweet_id' => ['required','exists:tweets,id'],
        'comment' => ['required','max:140'],
        ], 
    [
        'comment.required' => 'コメントを入力してください',
        'comment.max'      => '140文字以内にしてください',
    ]);

        if ($validator->fails()) {
            $allErrors = $validator->errors()->all();
            return back()
                ->withErrors(['message' => $allErrors])
                ->withInput();
    }
                $data = $request->only('tweet_id', 'comment','created_at');
                $data['user_id'] = auth()->id();
                $data['name']    = auth()->user()->name;

                Comment::create($data);

            //return redirect()->route('home');//コメントしたらホームへ行く。これはダメ
                return redirect()->back();
    }
}
