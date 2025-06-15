{{--@extends('layouts.app')--}}
@include('parts.header')
@section('content')


<main>
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

