@extends('layouts.app')

@section('content')
    @include('user.users', ['users' => $users])
@endsection