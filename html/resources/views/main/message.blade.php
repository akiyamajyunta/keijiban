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
        <p class='xxx'>{{$recipient_name}}</p>
    </div>
    <main>
        <div class='messagePosition'>
            @foreach ($messages as $message)
            <blockquote class="{{ $message->sender_id == Auth::id() ? 'rightMessage' : 'leftMessage' }}">
                <!-- <blockquote> -->
                {{ $message->message }}
            </blockquote>
            @endforeach

            <div class="directMassage">
                <form action="{{route('directMessages.store')}}" method="post">
                    @csrf
                    <section class="new-memo">
                        <input type="hidden" name="recipient_name" value="{{$recipient_name }}">
                        <input type="hidden" name="recipient_id" value="{{ $recipient }}">
                        <textarea placeholder="こんにちは" name='message' id='message'></textarea>
                        <button type='submit'>投稿</button>
                    </section>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
<style>
    .xxx {
        text-align: center;
        background-color: white;
        margin-top: 150px;
        width: 90%;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 10px;
        padding-top: 10px;
        padding-bottom: 10px;

    }

    .messagePosition {
        margin-top: 50px;
    }
</style>