@extends('layouts.app')
@section('content')
<div class="profile-wrap">
  <div class="row">
    <div class="col-md-4 text-center">
      @if ($user->profile_photo)
        <p>
          <img class="round-img" src="{{ asset('storage/user_images/' . $user->profile_photo) }}"/>
        </p>
        @else
          <img class="round-img" src="{{ asset('/images/blank_profile.png') }}"/>
      @endif
      {{ $user->profile_text }}
      @include('user_follow.follow_button', ['user' => $user])
    </div>
    <div class="col-md-8">
      <div class="row">
        <h1>{{ $user->name }}</h1>
        @if ($user->id == Auth::user()->id)
          <a class="btn btn-outline-dark common-btn edit-profile-btn" href="/users/edit">プロフィールを編集</a>
          <a class="btn btn-outline-dark common-btn edit-profile-btn" rel="nofollow" data-method="POST" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        @endif
      </div>
      
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="/users/{{ $user->id }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">TimeLine</a></li>
                <li class="nav-item"><a href="/users/{{ $user->id}}/followings" class="nav-link {{ Request::is('users/*/followings') ? 'active' : '' }}">Followings</a></li>
                <li class="nav-item"><a href="/users/{{ $user->id }}/followers" class="nav-link {{ Request::is('users/*/followers') ? 'active' : '' }}">Followers</a></li>
            </ul> 
            @include('user.users', ['users' => $users])
    </div>
  </div>
</div>
@endsection