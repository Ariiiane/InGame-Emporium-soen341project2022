<x-guest-layout>
    <div class="container"><h1>Edit Profile</h1></div>
    <div class="form-content">

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('edit') }}">
            @csrf
            <div class="form-row">  
                <fieldset>
                <legend>Update Email</legend>
                <div>
                    <label for="email">Email</label>
                    <div>
                        <input id="email" type="email" name="email" class="form-control"/>
                    </div>
                </div>
                </fieldset>

                <fieldset>
                <legend>Update Adress</legend>
                <div>
                <label for="address">Address</label>
                    <div>
                        <input id="address" type="text" name="address" class="form-control"/>
                    </div>
                <label for="province">Province</label>
                    <div>
                        <input id="province" type="text" name="province" class="form-control"/>
                    </div>
                <label for="postal_code">Postal Code</label>
                    <div>
                        <input id="postal_code" type="text" name="postal_code" class="form-control"/>
                    </div>
                </div>
                </fieldset>

                <fieldset>
                <legend>Update Password</legend>
                <div>
                <label for="new_password">New Password</label>
                    <div>
                        <input id="new_password" type="password" name="new_password" class="form-control"/>
                    </div>
                </div>
                </div>
                </fieldset>

                <div style="padding: 2px">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>

    </div>
    
</x-guest-layout>

