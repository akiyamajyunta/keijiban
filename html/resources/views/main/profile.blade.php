{{--@extends('layouts.app')--}}
@include('parts.header')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/message.css')}}">
    <link rel="stylesheet" href="{{ asset('css/timeline.css')}}">
    <link rel="stylesheet" href="{{ asset('css/aria.css')}}">
    <link rel="stylesheet" href="{{ asset('css/profile.css')}}">
    <title>プロフィール</title>
</head>

<body>


    @foreach ($users as $user)
    <a>プロフィール</a>
    <div class="container-parson">
        <div class="container">

            <p class="explanation">ユーザー情報</p>
            <hr>
            <p class="explanation">{{$user->name}}</p>

            <p class="explanation">{{$user->userId}}</p>

            <p class="explanation">{{$user->email}}</p>
            <hr>
            <p>{{$user->profile}}</p>

            @if (Auth::check() && $user->id !== Auth::id())
            <form action="">
                <input type="hidden" name="id">
                {{--value="{{$tweet->id}}"> --}}
                <button>ダイレクトメッセージ</button>
            </form>
            @endif
        </div>
    </div>
    @endforeach
    <main>
        @include('parts.timeline')
    </main>
</body>

</html>