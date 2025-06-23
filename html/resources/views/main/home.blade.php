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
    <title>Home</title>
</head>
<body>
    <div class='aria'>
        </div>
    <main >
        @error('message')
        <a>{{ $message }}</a>
        @enderror
        <div class='tweet'>
            <form action="{{route('tweet.store')}}">
                <section class="new-memo">
                    <textarea placeholder="いまどんなかんじ？" name="content" type="text"></textarea>
                    <button>投稿</button>
                </section>
            </form>
        </div>
        @include('parts.timeline')
    </main>
    
</body>

</html>

