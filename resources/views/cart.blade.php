<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>
</head>
<body style="background-color: #E7E7E7">
{{View::make('header')}}

<div class="background-cart">
    <div class="box-item">
        <div class="row-title-cart">
            <div class="font-your-cart">
                Your Cart
            </div>
            <div class="font-price">
                Price
            </div>
        </div>
        <div class="line">
        </div>
        @foreach ($cartItems as $cart)
        <div class="row-title-cart">
            <img class="image-product"
                 src="{{url('')}}{{ $cart->product->image_path }}" alt="item">
            <div class="column-info-item">
                <div class = "font-name-item">
                    {{$cart->product->name}}
                </div>
                <div class = "font-name-item">
                    {{$cart->product->description}}
                </div>
                <form action="{{route('cart.destroy',[$cart->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="font-delete" type="submit">Delete</button>
                </form>
            </div>
            <div class="column-price">
                <div class="font-price">
                    $ {{$cart->product->price}}
                </div>
            </div>
        </div>
        @endforeach
        <div class="line">
        </div>
        <div class="font-price">
            Total: $ {{$total}}
        </div>
    </div>

    <div class="box-checkout">
        <div class="font-checkout-price">
            Total: $ {{$total}}
        </div>
        <a class="checkout-btn" href="{{url('/checkout')}}">Proceed to Checkout </a>
    </div>
</div>

    <div class="footer-cart">
    {{View::make('footer')}}
</div>
</body>
</html>
