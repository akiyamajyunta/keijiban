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
    <link rel="stylesheet" href="{{ asset('css/button.css')}}">
</head>

<body>
    <div class="aria">
    </div>
    <main>
        @foreach ($threads as $thread)
        <section class="twi-list">
            <form class='contact_user' action="{{route('directMessages')}}" method="post">
                @csrf
                <div class="twi-item">
                    <div class="twi-header">
                        <span class="twi-user">{{$thread->name}}</span>
                    </div>
                </div>
                <div class="talk-button">
                    <input type="hidden" name="recipient_name" value="{{ $thread->name }}">
                    <input type="hidden" name="recipient_id" value="{{$thread->id}}">
                    <button class='btn-direct'>会話する</button>
                </div>
            </form>
        </section>
        @endforeach
    </main>
</body>

</html>

