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
        <div class="MassageAria">
            <!-- 降順ではなく逆順で表示させよう -->
            @foreach($messages as $message) 
            @if($message->sender_id === Auth::id())
            <blockquote>チャット1の文章をここに入力</blockquote>
            <a>{{$message->message}}</a>
            @else
            <blockquote>チャット2の文章をここに入力</blockquote>
            <a>{{$message->message}}</a>
            @endif
            @endforeach

        </div>
        <div>
            <blockquote class='leftMessage'>チャット1の文章をここに入力</blockquote>
            <blockquote class='rightMessage'>チャット2の文章をここに入力</blockquote>
        </div>
        <div class="directMassage">
            <form action="{{route('postMessage')}}" method="post">
                @csrf
                <section class="new-memo">
                    <input type="hidden" name="recipient_id" value="1">
                    <textarea placeholder="こんにちは" name='message' id='message'></textarea>
                    <button type='submit'>投稿</button>
                </section>
            </form>
        </div>
    </main>
</body>

</html>