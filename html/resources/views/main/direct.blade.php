{{-- @extends('layouts.app') --}}

@include('parts.header')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/direct.css') }}">
  <title>directMessage</title>
</head>
<body>
  

    <main>
        <div class="MassageAria">
            <!-- <div>降順ではなく逆順で表示させよう -->
            <blockquote>チャット1の文章をここに入力sssssss</blockquote>
            <blockquote>チャット2の文章をここに入力</blockquote>
            <blockquote>チャット1の文章をここに入力sssssss</blockquote>
            <blockquote>チャット2の文章をここに入力</blockquote>
            <blockquote>チャット1の文章をここに入力sssssss</blockquote>
            <blockquote>チャット2の文章をここに入力</blockquote>
            <blockquote>チャット1の文章をここに入力sssssss</blockquote>
            <blockquote>チャット2の文章をここに入力</blockquote>
            <blockquote>チャット1の文章をここに入力sssssss</blockquote>
            <blockquote>チャット2の文章をここに入力</blockquote>
            <blockquote>チャット1の文章をここに入力sssssss</blockquote>
            <blockquote>チャット2の文章をここに入力</blockquote>
            <blockquote>チャット1の文章をここに入力sssssss</blockquote>
            <blockquote>チャット2の文章をここに入力</blockquote>
            <blockquote>チャット1の文章をここに入力sssssss</blockquote>
            <blockquote>チャット2の文章をここに入力</blockquote>
            <blockquote>チャット1の文章をここに入力sssssss</blockquote>
            <blockquote>チャット2の文章をここに入力</blockquote>
            <blockquote>チャット1の文章をここに入力sssssss</blockquote>
            <blockquote>最後のメッセージ</blockquote>
        </div>
    </main>

    <main>
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



