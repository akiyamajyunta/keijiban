{{-- @extends('layouts.app') --}}

@include('parts.header')

@section('content')

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
            <!-- <div>降順ではなく逆順で表示させよう -->
            <blockquote>チャット1の文章をここに入力sssssss</blockquote>
            <blockquote>チャット2の文章をここに入力</blockquote>
        </div>
        <div class="directMassage">
            <form action="">
                <section class="new-memo">
                    <textarea placeholder="いまどんなかんじ？"></textarea>
                    <button>投稿</button>
                </section>
            </form>
        </div>
    </main>
</body>
</html>