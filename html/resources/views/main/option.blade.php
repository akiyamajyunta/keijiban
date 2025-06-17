{{--@extends('layouts.app')--}}
@include('parts.header')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/option.css') }}">
    <title>オプション</title>
</head>

<body>
    <div class="container-parson">
        <div class="container">
            <p class="explanation">個人情報の変更</p>
            @error('message')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <hr>

            <button class="change_button" onclick="toggleFormTab(this)">名前</button>
            <div class="form-tab">
                @csrf
                <form action="{{route('rename')}}">
                    <input type="text" name='name' placeholder="Username" />
                    <button class="change_button">送信</button>
                </form>
            </div>

            <button class="change_button" onclick="toggleFormTab(this)">プロフィール</button>
            <div class="form-tab">
                @csrf
                <form action="{{route('reProfile')}}">
                    <input type="text" name='profile' placeholder="profile" />
                    <button class="change_button">送信</button>
                </form>
            </div>

            <button class="change_button" onclick="toggleFormTab(this)">ユーザーID</button>
            <div class="form-tab">
                @csrf
                <form action="{{route('reUserId')}}">
                    <input type="text" name="userId" placeholder="accountName" />
                    <button class="change_button">送信</button>
                </form>
            </div>

            <button class="change_button" onclick="toggleFormTab(this)">パスワード</button>
            <div class="form-tab">
                @csrf
                <form action="{{route('rePassword')}}">
                    <input type="password" name="password" placeholder="password" />
                    <input type="password" name="password_confirmation" placeholder="password" />
                    <button class="change_button">送信</button>
                </form>
            </div>
            <hr>
            @csrf
            <form action="{{route('logout')}}">
                <button class="change_button">ログアウト</button>
            </form>
            <form action="{{route('register')}}">
                <button class="change_button">新規登録</button>
            </form>
        </div>
    </div>
</body>

</html>



<script>
function toggleFormTab(button) {
    const formTab = button.nextElementSibling;
    formTab.classList.toggle("open");
}
</script>