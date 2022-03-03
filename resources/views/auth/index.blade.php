@extends('auth.layout')
@section('pageTitle', 'User List')
@section('content')
    <div class="container">
        <h1>Users</h1>
        <table class="table table-bordered">
            <tr>
                <th>User ID</th>
                <th>Role</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Address</th>
                <th>Province</th>
                <th>Postal Code</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->province }}</td>
                    <td>{{ $user->postal_code }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
