<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Tweet;
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
    public function index()
    {
        // $tweets = Tweet::find(1);
        $user_id = Auth::id();
        $tweets = Tweet::where('user_id', $user_id)->get();
        return view('main/home', compact('tweets'));
    }

    public function option()
    {
        return view('main/option');
    }

        public function profile()
    {
        return view('main/profile');
    }
        public function message()
    {
        return view('main/message');
    }
        public function direct()
    {
        return view('main/direct');
    }
        public function UserSearch()
    {
        return view('UserSearch');
    }
    
        public function OtherProfile()
    {
        return view('OtherProfile');
    }
    
}
