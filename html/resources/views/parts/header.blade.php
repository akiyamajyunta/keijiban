@if(Auth::check())
@include('parts/loginHeader')
@else
@include('parts/notloginHeader')
@endif