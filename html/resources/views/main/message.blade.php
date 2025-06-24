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
        <p class='recipient-name'>{{$recipient_name}}</p>
    </div>

    <main>
        <div class='messagePosition'>
            @foreach ($messages as $message)
            <blockquote class="{{ $message->sender_id == Auth::id() ? 'rightMessage' : 'leftMessage' }}">
                <!-- <blockquote> -->
                {{ $message->message }}
            </blockquote>
            @endforeach

            <div class="inputMassage">
                <form action="{{route('directMessages.store')}}" method="post">
                    @csrf
                    <section class="new-twi">
                        <input type="hidden" name="recipient_name" value="{{$recipient_name }}">
                        <input type="hidden" name="recipient_id" value="{{ $recipient }}">
                        <textarea placeholder="こんにちは" name='message' id='message'></textarea>
                        <button class='btn-post' type='submit'>返信</button>
                    </section>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
