@extends('auth.layout')

@section('content')
    <main class="login-form">
        <div class="container"><h1>Register</h1></div>
        <div class="form-content">
            <div class="container">
                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-col">
                            <label for="first_name">First Name</label>
                            <div>
                                <input type="text" placeholder="First Name" id="first_name" class="form-control" name="first_name" required
                                       autofocus>
                                @if ($errors->has('first_name'))
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="last_name">Last Name</label>
                            <div>
                                <input type="text" placeholder="Last Name" id="last_name" class="form-control" name="last_name" required
                                       autofocus>
                                @if ($errors->has('last_name'))
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="email_address">Email</label>
                        <div>
                            <input type="text" placeholder="Email" id="email_address" class="form-control" name="email" required
                                   autofocus>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="password">Password</label>
                        <div>
                            <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="address">Address</label>
                        <div>
                            <input type="text" placeholder="Address" id="address" class="form-control" name="address" required>
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="province">Province</label>
                            <div>
                                <input type="text" placeholder="Province" id="province" class="form-control" name="province" required>
                                @if ($errors->has('province'))
                                    <span class="text-danger">{{ $errors->first('province') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="postal_code">Postal Code</label>
                            <div>
                                <input type="text" placeholder="Postal Code" id="postal_code" class="form-control" name="postal_code" required>
                                @if ($errors->has('postal_code'))
                                    <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
