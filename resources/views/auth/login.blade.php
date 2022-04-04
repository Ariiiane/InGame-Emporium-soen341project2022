@section('pageTitle', 'Login')

<x-guest-layout>
    <div class="container"><h1>Login</h1></div>
    <div class="form-content">

        <!-- Session Status -->
        <x-auth-session-status :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors :errors="$errors"/>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-row">

                <!-- Email Address -->
                <div class="form-row">
                    <label for="email">Email</label>
                    <div>
                        <input id="email" type="email" name="email" class="form-control" required/>
                    </div>
                </div>

                <!-- Password -->
                <div class="form-row">
                    <label for="password">Password</label>
                    <div>
                        <input id="password" type="password" name="password" class="form-control" required autocomplete="new-password"/>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="form-row">
                    <div class="checkbox">
                        <input type="checkbox" name="remember" value="lsRememberMe" id="rememberMe">
                        <label for="rememberMe">Remember Me</label>
                    </div>
                </div>
                <div style="padding: 2px">
                    <button type="submit" class="btn btn-primary">
                        Login
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>

