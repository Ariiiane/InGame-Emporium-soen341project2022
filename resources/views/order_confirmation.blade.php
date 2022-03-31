<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Checkout</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/checkout.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</head>
<body>
<header>
{{View::make('header')}}
</header>

<div class="content">
<div class="text-center">
<h1> Order Confirmation </h1>
<h4> Thank you for shopping at InGame Emporium! </h4>
</div>

<div class="container">
<div class="card my-4">
    <div class="card-header text-center">Order Details</div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Order #: {{$orderInfo[0]}}</li>
        <li class="list-group-item">Delivery address: {{$orderInfo[1]}}</li>
        <li class="list-group-item">Order date: {{$orderInfo[2]}}</li>
    </ul>
    <div class="card-footer bg-transparent text-center">For more details, go to your profile and find this order!</div>
</div>
</div>
</div>
<footer>
{{View::make('footer')}}
</footer>
</body>
</html>
