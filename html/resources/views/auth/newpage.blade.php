
@extends('layouts.app')

@section('title', 'ログイン')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/button.css') }}">
@endsection

@include('parts.header')
@section('content')

    <main>
        <div class="container-parson">
            @if(isset($message))
            <p style="text-align: center;">{{ $message }}</p>
            @endif
            <div class="container">
                <form action="{{route('showlogin')}}">
                    <button class="btn-auth">ログイン</button>
                </form>
                <form action="{{route('showRegistrationForm')}}">
                    <button class="btn-auth">新規登録</button>
                </form>
            </div>
        </div>
    </main>
@endsection