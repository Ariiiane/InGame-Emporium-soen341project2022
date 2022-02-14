<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel 8.x CRUD from Scratch</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<div class="container">

    <div class="text-center" style="margin: 50px 0 50px 0;"><a href="{{url('products')}}">BACK</a><br>BASIC CRUD SAMPLE
    </div>

    @yield('content')
</div>

</body>
</html>