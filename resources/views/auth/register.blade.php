@section('pageTitle', 'Register')

<x-guest-layout>
    <div class="container"><h1>Register</h1></div>
    <div class="form-content">

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-row">
                <!-- First Name -->
                <div class="form-col" style="padding: 10px 1px">
                    <label for="first_name">First Name</label>
                    <div>
                        <input id="first_name" type="text" name="first_name" class="form-control" required/>
                    </div>
                </div>

                <!-- Last Name -->
                <div class="form-col" style="padding: 10px 1px">
                    <label for="last_name">Last Name</label>
                    <div>
                        <input id="last_name" type="text" name="last_name" class="form-control" required/>
                    </div>
                </div>

                <!-- Role -->
                <div style="padding: 10px 1px">
                    <label for="role">Role</label>
                    <select name="role" id="role" required>
                        <option>--</option>
                        <option value="admin">admin</option>
                        <option value="buyer">buyer</option>
                        <option value="seller">seller</option>
                    </select>
                </div>

                <!-- Email -->
                <div>
                    <label for="email">Email</label>
                    <div>
                        <input id="email" type="email" name="email" class="form-control" required/>
                    </div>
                </div>

                <!-- Password -->
                <div class="form-col">
                    <label for="password">Password</label>
                    <div>
                        <input id="password" type="password" name="password" class="form-control" required autocomplete="new-password"/>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="form-col">
                    <label for="password_confirmation">Confirm Password</label>
                    <div>
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required/>
                    </div>
                </div>

                <!-- Address -->
                <div>
                    <label for="address">Address</label>
                    <div>
                        <input id="address" type="text" name="address" class="form-control" required/>
                    </div>
                </div>

                <!-- Province -->
                <div class="form-col">
                    <label for="province">Province</label>
                    <div>
                        <input id="province" type="text" name="province" class="form-control" required/>
                    </div>
                </div>

                <!-- Postal Code -->
                <div class="form-col">
                    <label for="postal_code">Postal Code</label>
                    <div>
                        <input id="postal_code" type="text" name="postal_code" class="form-control" required/>
                    </div>
                </div>
                <div class="form-col">
                    <a href="{{ route('login') }}">Already Registered?</a>
                </div>
                <div class="form-col">
                    <div class="checkbox">
                        <input type="checkbox" name="remember" value="lsRememberMe" id="rememberMe">
                        <label for="rememberMe">Remember Me</label>
                    </div>
                </div>
                <div style="padding: 2px">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>

