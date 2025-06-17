{{--@extends('layouts.app')--}}
@include('parts.header')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <title>contact</title>
</head>

<body>
    <!-- 連絡先一覧表。田中、山田とかにメッセージを送る。バックエンドが出来たら、DM機能を実施したら、cssを引っ越す-->

    <main>
        <section class="memo-list">
            <a href="{{route('message')}}" style="text-decoration:none">
                <!-- サンプルとして1件だけ表示、この’メモ’アイテムをforeachとかでふやしたいね -->
                <div class="memo-item">
                    <div class="memo-header">
                        <span class="memo-user">山田</span>
                        <div class='memo-controls'>
                        </div>
                    </div>
                    <div class="memo-content">
                        山田
                        yamada1234
                    </div>
                </div>
            </a>
        </section>
        <section class="memo-list">
            <a href="{{route('message')}}" style="text-decoration:none">
                <!-- サンプルとして1件だけ表示、この’メモ’アイテムをforeachとかでふやしたいね -->
                <div class="memo-item">
                    <div class="memo-header">
                        <span class="memo-user">山田</span>
                        <div class='memo-controls'>
                        </div>
                    </div>
                    <div class="memo-content">
                        山田
                        yamada1234
                    </div>
                </div>
            </a>
        </section>
        <section class="memo-list">
            <a href="{{route('message')}}" style="text-decoration:none">
                <!-- サンプルとして1件だけ表示、この’メモ’アイテムをforeachとかでふやしたいね -->
                <div class="memo-item">
                    <div class="memo-header">
                        <span class="memo-user">山田</span>
                        <div class='memo-controls'>
                        </div>
                    </div>
                    <div class="memo-content">
                        山田
                        yamada1234
                    </div>
                </div>
            </a>
        </section>
    </main>

</body>

</html>