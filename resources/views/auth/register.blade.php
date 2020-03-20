@extends('layouts.app')
@section('content')
<div class="main">
  <div class="card devise-card">
    <div class="form-wrap">
      <div class="form-group text-center">
        <h2>は・ら・る</h2>
        <p class="text-secondary">Share Japanese halal restaurant!</p>
      </div>
      <form method="POST" action="{{ route('register') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <input class="form-control" placeholder="Mail Address" autocomplete="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <div class="form-group">
          <input class="form-control" placeholder="User Name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-group">
          <input class="form-control" placeholder="Password" autocomplete="off" type="password" name="password" required>
        </div>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <div class="form-group">
          <input class="form-control" placeholder="Confirm Password" autocomplete="off" type="password" name="password_confirmation" required>
        </div>

        <div class="actions">
          <input type="submit" name="commit" value="Register" class="btn btn-primary w-100">
        </div>
      </form>
      <br>

      <p class="devise-link">
        Do you have an account?
        <a href="/users/sign_in">Sign in</a>
      </p>
    </div>
  </div>
</div>
@endsection