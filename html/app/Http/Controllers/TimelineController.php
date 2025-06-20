<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;


class TimelineController extends Controller
{
        public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:140'
        ]);

        Tweet::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name,
            'content' => $request->content,
        ]);

        return redirect()->route('home');
    }


        public function delete(Request $request)
    {
        $tweetId = $request->input('id');
        $tweet = Tweet::findOrFail($tweetId);

        if (Auth::id() !== $tweet->user_id) {
            redirect()->back();;
        }
        
            // ツイートを削除
            $tweet->delete();
            
            return redirect()->back();
    }
}


//store