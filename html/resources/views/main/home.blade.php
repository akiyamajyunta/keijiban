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
    <title>Home</title>
</head>
<body>
    <main>
        <div class='aria'>
        </div>
        <!-- 新規メモ投稿エリア、投稿フォーム -->
        @error('message')
        <a>{{ $message }}</a>
        @enderror
        <form action="{{route('tweet.store')}}">
            <section class="new-memo">
                <textarea placeholder="いまどんなかんじ？" name="content" type="text"></textarea>
                <button>投稿</button>
            </section>
        </form>
        @include('parts.timeline')
    </main>
    
</body>

</html>
