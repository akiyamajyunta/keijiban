{{--@extends('layouts.app')--}}
@include('parts.header')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/option.css') }}">
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">
    <title>オプション</title>
</head>

<body>

    <main>
        @foreach ($users as $user)
        <div class="container-parson">
            <div class="container">
                <p class="explanation">個人情報の変更</p>
                @error('message')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <hr>
                <button class="btn-want" onclick="toggleFormTab(this)">名前</button>
                <div class="form-tab">
                    <form action="{{route('rename')}}" method="post">
                        @csrf
                        <input type="text" name='name' value='{{$user->name}}' placeholder="Username" />
                        <button class="btn-change">変更</button>
                    </form>
                </div>

                <button class="btn-want" onclick="toggleFormTab(this)">プロフィール</button>
                <div class="form-tab">
                    <form action="{{route('reProfile')}}" method="post">
                        @csrf
                        <input type="text" name='profile' value='{{$user->profile}}' placeholder="profile" />
                        <button class="btn-change">変更</button>
                    </form>
                </div>

                <button class="btn-want" onclick="toggleFormTab(this)">ユーザーID</button>
                <div class="form-tab">

                    <form action="{{route('reUserId')}}" method="post">
                        @csrf
                        <input type="text" name="userId" value='{{$user->userId}}' placeholder="accountName" />
                        <button class="btn-change">変更</button>
                    </form>
                </div>

                <button class="btn-want" onclick="toggleFormTab(this)">パスワード</button>
                <div class="form-tab">
                    <form action="{{route('rePassword')}}" method="post">
                        @csrf
                        <input type="password" name="password" placeholder="password" />
                        <input type="password" name="password_confirmation" placeholder="password" />
                        <button class="btn-change">変更</button>
                    </form>
                </div>
                <hr>

                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="btn-change">ログアウト</button>
                </form>
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <button class="btn-change">新規登録</button>
                </form>
            </div>
        </div>
        @endforeach
    </main>
</body>

</html>



<script>
    function toggleFormTab(button) {
        const formTab = button.nextElementSibling;
        formTab.classList.toggle("open");
    }
</script>