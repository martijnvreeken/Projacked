@extends('layouts.index')

@section('content')
<div class="container">
    <h1 class="title is-2">Login</h1>
    <form class="form" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="field">
            <label class="label">Username</label>
            <div class="control has-icons-left">
                <input id="email" type="email" class="input{{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" placeholder="e-mail address" required autofocus>
                <span class="icon is-small is-left">
                    <i class="fa fa-user"></i>
                </span>
            </div>
            @if ($errors->has('email'))
            <p class="help is-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="field">
            <label class="label">Password</label>
            <div class="control">
                <input id="password" type="password" class="input{{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>
            </div>
            @if ($errors->has('password'))
            <p class="help is-danger">{{ $errors->first('password') }}</p>
            @endif
        </div>
        <div class="field">
            <div class="control">
                <label class="checkbox">
                    <input type="checkbox" name="remember">
                    Remember me
                </label>
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary" type="submit">Login</button>
            </div>
            <div class="control">
                <a class="button is-link" href="{{ url('/password/reset') }}">
                    Forgot Your Password?
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
