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
    public function index()
    {
        $user_id = Auth::id();
        $tweets = Tweet::where('user_id', $user_id)->get();
        return view('main/home', compact('tweets'));
    }

    public function option()
    {
        return view('main/option');
    }

    public function profile(Request $request)
    {   
        $user_id = Auth::id();
        $tweet_user_Id = $request->input('user_id');
        
        if(empty($tweet_user_Id)){
            $users = User::where('id', $user_id)->get(); 
            $tweets = Tweet::where('user_id', $user_id)->get();
            return view('main/profile',compact('users', 'tweets'));
        }
        if($tweet_user_Id != $user_id){
            $users = User::where('id', $tweet_user_Id )->get(); 
            $tweets = Tweet::where('user_id', $tweet_user_Id )->get();
            return view('main/profile',compact('users', 'tweets'));
        }
            $users = User::where('id', $user_id)->get(); 
            $tweets = Tweet::where('user_id', $user_id)->get();
            return view('main/profile',compact('users', 'tweets'));
    }


    public function message()
    {
        return view('main/message');
    }

    public function UserSearch()
    {
        return view('UserSearch');
    }
    
    public function OtherProfile()
    {
        return view('OtherProfile');
    }
    
    public function search(Request $request)
    {
        $search = $request->input('search');

        if(!empty($search)){

            $tweets = Tweet::where('content', 'LIKE', "%{$search}%")->get();

        }else{
            
            $tweets = Tweet::all();
        }

        return view('main/search', compact('tweets'));
    }

}