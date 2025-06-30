{{-- @extends('layouts.app') --}}

@include('parts.header')

{{-- @section('content') --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/aria.css')}}">
    <link rel="stylesheet" href="{{ asset('css/message.css')}}">
    <link rel="stylesheet" href="{{ asset('css/button.css')}}">
    <title>directMessage</title>
</head>

<body>
    <div class="aria">
        <p class='recipient-name'>{{$recipient_name}}
            {{$recipient_user_id}}
            @error('message')
            <br>
            {{ $message }}
            @enderror
        </p>
    </div>

    <main>
        <div class='messagePosition'>
            <div class='massageAria'>
                @foreach ($messages->reverse() as $message)

                <blockquote class="{{ $message->sender_id == Auth::id() ? 'rightMessage' : 'leftMessage' }}">
                    {{ $message->message }}
                </blockquote>
                @endforeach
            </div>
        </div>
    </main>

    <div class="inputMassage">
        <section class="new-twi">
            <form action="{{route('directMessages.store')}}" method="post">
                @csrf
                <input type="hidden" name="recipient_name" value="{{$recipient_name }}">
                <input type="hidden" name="recipient_id" value="{{ $recipient }}">
                <input type="hidden" name="recipient_user_id" value="{{$recipient_user_id}}">
                <textarea class='message-post' placeholder="こんにちは" name='message' id='message'>{{$make_talk}}</textarea>
                <div class='post-btn-set'>
                    <button class='btn-post' type='submit'>返信</button>
                    <button class='btn-post' type="button" onclick="document.getElementById('commu-form').submit();">与太</button>
                </div>
            </form>
            <form id="commu-form" action="{{route('message.make')}}" method="post" style="display: none;">
                @csrf
                <input type="hidden" name="recipient_name" value="{{$recipient_name }}">
                <input type="hidden" name="recipient_id" value="{{ $recipient }}">
                <input type="hidden" name="recipient_user_id" value="{{$recipient_user_id}}">
                <input type="hidden" name="last_message" value="{{$lastReceivedMessage->message}}">
            </form>
        </section>
    </div>
</body>

</html>