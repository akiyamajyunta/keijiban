@extends('layouts.app')

@section('title', '新規登録')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
<link rel="stylesheet" href="{{ asset('css/button.css') }}">
@endsection

@include('parts.header')
@section('content')

<main>
    <div class="container-parson">
        <div class="container">
            <h2>ユーザー登録</h2>
            <form method="POST" action="{{ route('register')}}" autocomplete="off">
                @csrf
                <div class="input-from">
                    <label for="name" class="form-label">ユーザー名</label>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input id="name" type="text" name="name" class="form-control" value="{{ old('name', 'わたし') }}">
                </div>
                <!-- 課題１なまえを空欄にすると以前登録した奴がパスワードもろとも出てくる -->
                <div class="input-from">
                    <label for="email" class="form-label">メールアドレス</label>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input id="email" type="email" name="email" class="form-control" value="{{ old('email', '') }}">
                </div>

                <div class="input-from">
                    <label for="userId" class="form-label">ユーザーID</label>
                    @error('userId')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input id="userId" type="text" name="userId" class="form-control" value="{{ old('userId', '') }}">
                </div>

                <div class="input-from">
                    <label for="password" class="form-label">パスワード</label>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input id="password" type="password" name="password" class="form-control" value="{{ old('password', '') }}">
                </div>

                <div class="input-from">
                    <label for="password-confirm" class="form-label">パスワード確認</label>
                    @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input id="password-confirm" type="password" name="password_confirmation" class="form-control" value="{{ old('password', '') }}">
                </div>
                <button type="submit" class="btn-auth">登録</button>
            </form>
            <div>
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mx-2">戻る</a>
            </div>
        </div>
    </div>
</main>
@endsection