@extends('layouts.app')

@section('title', 'HOME')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/aria.css') }}">
    <link rel="stylesheet" href="{{ asset('css/message.css')}}">
    <link rel="stylesheet" href="{{ asset('css/timeline.css')}}">
    <link rel="stylesheet" href="{{ asset('css/home.css')}}">
    <link rel="stylesheet" href="{{ asset('css/button.css')}}">
@endsection

@include('parts.header')
@section('content')
    <div class='aria'>
    </div>
    <main>
        @error('message')
        <a>{{ $message }}</a>
        @enderror
        <div class='tweet'>
            <section class="new-twi">
                <form action="{{route('tweet.store')}}" method="post">
                    @csrf
                    <textarea placeholder="いまどんなかんじ？" name="content">{{$talk}}</textarea>
                    <input type="hidden" name="talk" value="">

                    <div class='post-btn-set'>
                        <button class='btn-post' type="submit">投稿</button>
                        <button class='btn-post' type="button" onclick="document.getElementById('commu-form').submit();">与太</button>
                    </div>
                </form>
                <!-- 隠しフォーム -->
                <form id="commu-form" action="{{route('tweet.make')}}" method="post" style="display: none;">
                    @csrf
                </form>
            </section>
        </div>
        @include('parts.timeline')
    </main>
@endsection