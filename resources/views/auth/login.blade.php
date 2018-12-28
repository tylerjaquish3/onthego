
@extends('layouts.login')

@section('content')
    <form id="loginForm"  method="POST" action="{{ route('auth.post') }}">
        {!! csrf_field() !!}
        
        <div id="login_bumper">
            <h5 class="title">{{ config('app.name') }}</h5>
            <div class="login-fields">
                <input type="text" name="email" value="{{ old('email') }}" class="block_input" placeholder="email"
                       required autofocus>
                @if ($errors->has('email'))
                    <p class="message error">{!! $errors->first('email') !!}</p>
                @endif

                <input type="password" name="password" id="password" class="block_input" placeholder="password" required/>
                @if ($errors->has('password'))
                    <p class="message error">{!! $errors->first('password') !!}</p>
                @endif
                <div class="input-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"  name="remember" class="flat">
                            <span>Remember Me</span>
                        </label>
                    </div>
                </div>

                <div class="text--right">
                    <button type="submit" class="btn btn-primary pull-right">LOG IN</button>
                </div>
            </div>
        </div>

    </form>

@endsection