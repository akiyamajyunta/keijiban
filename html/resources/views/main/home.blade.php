{{--@extends('layouts.app')--}}
@include('parts.header')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Document</title>
</head>
<body>

    <main>
            <div class='memo-aria'>
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

<style>
    .memo-aria{
    background-color: red;
    padding-top: 20px;
    width: 600px;
    position: fixed;
    height: 100px;
    margin: auto;
    display: block;
    z-index: -100;
    
}

</style>