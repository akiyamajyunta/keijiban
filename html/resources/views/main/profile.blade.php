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

<main>
    @foreach ($users as $user)
    <!-- <a style="textaline:centsr">
        プロフィール
    </a> -->
    <div class="container-parson">
        <div class="container">

            <p class="explanation">ユーザー情報</p>
            <hr>
            <p class="explanation">{{$user->name}}</p>

            <p class="explanation">{{$user->userId}}</p>

            <p class="explanation">{{$user->email}}</p>
            <hr>
            <p>{{$user->profile}}</p>
<!-- もし、プロフィールのIDとログイン中のIDが一致しなければ（他人だったら）、DM -->
 <!-- directMessages ここではstoreに行く-->
            @if (Auth::check() && $user->id !== Auth::id())
            <form action="{{route('directMessages')}}" method="get">
                <input type="hidden" name="recipient_name" value="{{$user->name}}">
                <input type="hidden" name="recipient_id" value="{{$user->id}}">
                <button>ダイレクトメッセージ</button>
            </form>
            @endif
        </div>
    </div>
    @endforeach
    
        @include('parts.timeline')
    </main>
</body>

</html>