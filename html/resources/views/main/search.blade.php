@extends('layouts.app')

@section('title', 'Search')

@section('styles')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('css/message.css')}}">
<link rel="stylesheet" href="{{ asset('css/timeline.css')}}">
<link rel="stylesheet" href="{{ asset('css/aria.css')}}">
<link rel="stylesheet" href="{{ asset('css/button.css')}}">
@endsection

@include('parts.header')
@section('content')

<div class="aria">

</div>

<main>
    @include('parts.timeline')
</main>
@endsection