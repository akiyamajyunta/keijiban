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
            // 'userId' => Auth::user()->userId,
            // 'user_id' => 123,
            'user_id' => Auth::id(), 
            'content' => $request->content,
        ]);

        // return view('main/index');
        return redirect()->route('home');
    }
}


//store