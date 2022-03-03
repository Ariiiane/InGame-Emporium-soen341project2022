@extends('auth.layout')
@section('pageTitle', 'Dashboard')
@section('content')
    <div class="container">
        <div class="container"><h1>Dashboard</h1></div>
        <div class="form-content">
            <div class="form-row">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                You are Logged In
            </div>
        </div>
    </div>
@endsection
