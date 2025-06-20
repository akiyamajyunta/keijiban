{{-- @extends('layouts.app') --}}

@include('parts.header')

{{-- @section('content') --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/message.css')}}">
    <link rel="stylesheet" href="{{ asset('css/aria.css')}}">
    <title>directMessage</title>
</head>

<body>
    <div class="aria">

    </div>
    <main>
        <a>{{$recipient_name}}</a>
        @foreach ($messages as $message)
        <blockquote class="{{ $message->sender_id == Auth::id() ? 'rightMessage' : 'leftMessage' }}">
            {{ $message->message }}
        </blockquote>
        @endforeach

        <div class="directMassage">
            <form action="{{route('directMessages.store')}}" method="post">
                @csrf
                <section class="new-memo">
                    <input type="hidden" name="recipient_id" value="{{ $message->recipient_id}}">
                    <textarea placeholder="こんにちは" name='message' id='message'></textarea>
                    <button type='submit'>投稿</button>
                </section>
            </form>
        </div>
    </main>
</body>

</html>