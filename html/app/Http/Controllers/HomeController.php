<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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


        
        return view('main/home');
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
