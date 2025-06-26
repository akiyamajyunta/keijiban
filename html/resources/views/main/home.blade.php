{{--@extends('layouts.app')--}}
@include('parts.header')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/aria.css') }}">
    <link rel="stylesheet" href="{{ asset('css/message.css')}}">
    <link rel="stylesheet" href="{{ asset('css/timeline.css')}}">
    <link rel="stylesheet" href="{{ asset('css/home.css')}}">
    <link rel="stylesheet" href="{{ asset('css/button.css')}}">
    <title>Home</title>
</head>

<body>
    <div class='aria'>
    </div>
    <main>
        @error('message')
        <a>{{ $message }}</a>
        @enderror
        <div class='tweet'>

            <section class="new-twi">
                <div>
                    <form action="{{route('tweet.store')}}" method="post">
                        @csrf
                        <textarea placeholder="いまどんなかんじ？" name="content">{{$talk}}</textarea>
                        <input type="hidden" name="talk" value="">
                        <button class='btn-post'>投稿</button>
                    </form>
                    <form action="{{route('tweet.make')}}" method="post">
                        @csrf
                        <button class='btn-post'>コミュ強太郎</button>
                    </form>
                </div>
            </section>
        </div>
        @include('parts.timeline')
    </main>

</body>

</html>