@extends('auth.layout')
@section('pageTitle', 'Login')
@section('content')
    <main class="login-form">
        <div class="container"><h1>Login</h1></div>
        <div class="form-content">
            <div class="container">
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <label for="email_address">Email</label>
                        <div>
                            <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="password">Password</label>
                        <div>
                            <input type="password" id="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
