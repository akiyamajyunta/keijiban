<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    use AuthenticatesUsers;

    // ログイン画面の表示
    public function showLoginForm()
    {
        return view('auth.customLogin');
    }

    // ガードの指定
    protected function guard()
    {
        return Auth::guard('custom');
    }

    protected $redirectTo = '/customHome';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

        public function index()
    {
        return view('customHome');
    }
}

