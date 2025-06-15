{{--@extends('layouts.app')--}}
@include('parts.header')
@section('content')

@foreach ($users as $user)  
<a>プロフィール</a>
<div class="container-parson">
    <div class="container">

            <p class="fsize">ユーザー情報</p>
            <hr>
            <p class="fsize">{{$user->name}}</p>

            <p class="fsize">{{$user->userId}}</p>

            <p class="fsize">{{$user->email}}</p>
            <hr>
            <p>{{$user->profile}}</>
    </div>
</div>
@endforeach   
  <main>
    @include('parts.timeline')
  </main>
<style>


.fsize{
  font-size: 24px;
  margin: 0;
  text-align: center;
}
.container-parson{
justify-content: center;
margin-top: 150px;
}
.container {
  width: 300px;
  margin: auto;
  padding: 20px;
  background-color: #ffffff;
  border: 1px solid #ccc;
  border-radius: 5px;
  justify-content: center;
  text-align: center;
}

h2 {
  text-align: center;
  margin-bottom: 20px;
}

input[type="text"],
input[type="password"] {
  width: 93%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

.change_button{
    background-color: white;
    width: 50%;
    color: black;
    border: 1px solid black;
    padding: 3px 6px;
    cursor: pointer;
    font-size: 1rem;
  	margin-top: 3%;
    margin-bottom: 3%;
    justify-content: center;
}


</style>


