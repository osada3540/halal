@extends('layouts.app')
@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to は・ら・る</h1>
        </div>
    </div>
    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
    サインアウト<br/>
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
{{ csrf_field() }}
</form>
@endsection