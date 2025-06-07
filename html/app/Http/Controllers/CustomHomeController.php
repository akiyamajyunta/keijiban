<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomHomeController extends Controller
{
    public function index()
    {
        return view('customHome');
    }
}
