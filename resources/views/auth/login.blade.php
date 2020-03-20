@extends('layouts.app')

@section('content')
<div class="main">
  <div class="card devise-card">
    <div class="form-wrap">
      <div class="form-group text-center">
        <h2>は・ら・る</h2>
      </div>
      <form class="new_user" id="new_user" action="{{ route('login') }}" accept-charset="UTF-8" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <input id="email" type="email" class="form-control" name="email"  placeholder="Mail Address" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
          <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        
        <div class="actions">
          <input type="submit" name="commit" value="Sign in" class="btn btn-primary w-100">
        </div>
      </form>

      <br>

      <p class="devise-link">
        Do you have an account?
        <a href="{{ route('register') }}">Register</a>
      </p>

    </div>
  </div>
</div>
@endsection