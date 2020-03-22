@extends('layouts.app')
@section('content')

@if (count($posts) > 0)
@include('post.posts', ['posts' => $posts])
@endif
@endsection