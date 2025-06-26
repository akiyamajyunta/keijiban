{{--@extends('layouts.app')--}}

@section('content')

@auth
<p class="text-center">ログイン中: {{ Auth::user()->name }}</p>
@endauth
@include('parts.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">
    <title>ログイン</title>
</head>

<body>
    <div class="container-parson">
        @if(isset($message))
        <p style="text-align: center;">{{ $message }}</p>
        @endif
        <div class="container">
            <form action="{{ route('login')}}">
                <button class="btn-auth">ログイン</button>
            </form>
            <form action="{{route('showRegistrationForm')}}">
                <button class="btn-auth">新規登録</button>
            </form>
        </div>
    </div>
</body>

</html>