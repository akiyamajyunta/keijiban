{{--@extends('layouts.app')--}}
@include('parts.header')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aria.css') }}">
    <title>contact</title>
</head>

<body>

    <div class="aria">

    </div>
    <main>
        @foreach ($threads as $thread)
        <section class="memo-list">
            <form action="{{route('directMessages')}}">
            <!-- <a href="{{route('directMessages')}}" style="text-decoration:none"> -->
                <input type="hidden" name="recipient_name" value="{{ $thread->name }}">
                <input type="hidden" name="recipient_id" value="{{$thread->id}}">
                <button>会話する</button>
                <!-- サンプルとして1件だけ表示、この’メモ’アイテムをforeachとかでふやしたいね -->
                <div class="memo-item">
                    <div class="memo-header">
                        <span class="memo-user">{{$thread->name}}</span>
                        <div class='memo-controls'>
                        </div>
                    </div>
                </div>
            <!-- </a> -->
            </form>
        </section>
        @endforeach
    </main>
</body>

</html>