@extends('layouts.app')

@section('title', 'contact')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aria.css') }}">
    <link rel="stylesheet" href="{{ asset('css/button.css')}}">
@endsection


@include('parts.header')
@section('content')
    <div class="aria">
    </div>
    <main>
        @foreach ($threads as $thread)
        <section class="twi-list">
            <form class='contact_user' action="{{route('directMessages')}}" method="post">
                @csrf
                <div class="twi-item">
                    <div class="twi-header">
                        <span class="twi-user">{{$thread->name}}</span>
                        <span class="twi-user">{{$thread->userId}}
                        </span>
                    </div>
                </div>
                <div class="talk-button">
                    <input type="hidden" name="recipient_name" value="{{ $thread->name }}">
                    <input type="hidden" name="recipient_id" value="{{$thread->id}}">
                    <input type="hidden" name='recipient_user_id' value='{{$thread->userId}}'>
                    <button class='btn-direct'>会話する</button>
                </div>
            </form>
        </section>
        @endforeach
    </main>
</body>
</html>