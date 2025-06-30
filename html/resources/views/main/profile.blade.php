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
    <link rel="stylesheet" href="{{ asset('css/button.css')}}">
    <title>プロフィール</title>
</head>

<body>
    <div class="aria">

    </div>
    <main>
        @foreach ($users as $user)

        <div class="container-parson">
            <div class="container">

                <p class="explanation">ユーザー情報</p>
                <hr>
                <p class="explanation">{{$user->name}}</p>

                <p class="explanation">{{$user->userId}}</p>
                @if (Auth::check() && $user->id == Auth::id())
                <p class="explanation">{{$user->email}}</p>
                @endif
                <hr>
                <p>{{$user->profile}}</p>
                <!-- もし、プロフィールのIDとログイン中のIDが一致しなければ（他人だったら）、DM -->
                <!-- directMessages ここではstoreに行く-->
                <div class='profile-button-set'>
                    @if (Auth::check() && $user->id !== Auth::id())
                    <form action="{{route('directMessages')}}" method="post">
                        @csrf
                        <input type="hidden" name="recipient_name" value="{{ $user->name }}">
                        <input type="hidden" name="recipient_id" value="{{$user->id}}">
                        <input type="hidden" name="recipient_user_id" value="{{$user->userId}}">
                        <button class='btn-direct'>ダイレクトメッセージ</button>
                    </form>

                    @if(Auth::user()->followings->contains($user->id))
                    <!-- フォローしている場合は、アンフォローボタン（フォローを外す）を表示 -->
                    <form action="{{ route('unfollow')}}" method="get">
                        @csrf
                        <input type="hidden" name="un_follow_id" value="{{$user->id}}">
                        <button class='btn-follow' type="submit">フォローを外す</button>
                    </form>
                    @else
                    <!-- フォローしていない場合は、フォローボタンを表示 -->
                    <form action="{{ route('follow') }}" method="get">
                        @csrf
                        <input type="hidden" name="follow_id" value="{{$user->id}}">
                        <button class='btn-follow' type="submit">フォローする</button>
                    </form>
                    @endif
                </div>


            </div>
            @endif
        </div>
        </div>
        @endforeach

        @include('parts.timeline')
    </main>
</body>

</html>