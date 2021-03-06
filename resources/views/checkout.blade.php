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
<div class="container">
  <div class="row">
    <div class="col-6 text-center">
      <h3>Checkout</h3>
      <div class="card my-4">
        <div class="card-header">Verify Delivery Information</div>
        <div class="card-body">
            <form method="POST" id="delivery-info" action="{{url('/order_confirmation')}}">
            @csrf <!-- {{ csrf_field() }} -->
                <div class="row">
                    <div class="col">
                        <label for="input_first_name">First Name</label>
                        <input type="text" class="form-control" id="input_first_name" name="first_name" value="{{$info->first_name}}">
                    </div>
                    <div class="col">
                        <label for="input_last_name">Last Name</label>
                        <input type="text" class="form-control" id="input_last_name" name="last_name" value="{{$info->last_name}}">
                    </div>
                </div>
                </br>
                <div class="form-group">
                    <label for="input_email">Email</label>
                    <input type="email" class="form-control" id="input_email" name="email" value="{{$info->email}}">
                </div>
                </br>
                <div class="form-group">
                    <label for="input_address">Address</label>
                    <input type="text" class="form-control" id="input_address" name="address" value="{{$info->address}}">
                </div>
                </br>
                <div class="row">
                    <div class="col">
                        <label for="input_province">Province</label>
                        <input type="text" class="form-control" id="input_province" name="province" value="{{$info->province}}">
                    </div>
                    <div class="col">
                        <label for="input_postal_code">Postal Code</label>
                        <input type="text" class="form-control" id="input_postal_code" name="postal_code" value="{{$info->postal_code}}">
                    </div>
                </div>
                <input type="hidden" id="total" name="total" value="{{$totals[2]}}">
            <hr>
        <h3>Payment</h3>
                    <div class="row">
                    <h6>Select Payment Method</h6>
                    <label class="container">Credit
                        <input type="radio" checked="checked" name="radio">
                        <span class="checkmark"></span>
                    </label>
                    <label class="container">Debit
                        <input type="radio" name="radio">
                        <span class="checkmark"></span>
                    </label>
                        <div class="col">
                            <label for="input_full_name">Name On Card</label>
                            <input type="text" class="form-control" id="input_full_name" name="card_full_name" value="">
                        </div>
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="input_card_number">Card Number</label>
                        <input type="text" class="form-control" id="input_card_number" name="card_number" value="">
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="input_expiration_date">MM/YYYY</label>
                        <input type="text" class="form-control" id="input_expiration_date" name="card_expiry" value="">
                    </div>
                    </br>
                    <div class="row">
                        <div class="col">
                            <label for="input_cvv">CVV</label>
                            <input type="text" class="form-control" id="input_cvv" name="card_cvv" value="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-6 text-center">
        <h3> Order Summary </h3>
        <div class="card my-4">
            <div class="card-header">Items & Total</div>
            <div class="card-body">
                @foreach ($items as $item)
                <!-- For each item in cart -->
                <div class="row">
                    <div class="col text-start"><img src="{{url('')}}{{ $item->product->image_path }}" width="40" height="40" alt="{{$item->product->name}}"></div>
                    <div class="col">{{$item->product->name}}</div>
                    <div class="col text-end">Qty: 1</div>
                </div>
                @endforeach
                </br>
                <div class="row">
                    <div class="col text-start">Shipping:</div>
                    <div class="col text-end fw-bold">FREE</div>
                </div>
            </div>
            <div class="card-footer bg-transparent">
                <div class="row">
                    <div class="col text-start">SUBTOTAL:</div>
                    <div class="col text-end">${{$totals[0]}}.00</div>
                </div>
                <div class="row">
                    <div class="col text-start">Taxes:</div>
                    <div class="col text-end">${{$totals[1]}}</div>
                </div>
                <div class="row fw-bold">
                    <div class="col text-start">TOTAL:</div>
                    <div class="col text-end">${{$totals[2]}}</div>
                </div>
            </div>
        </div>


        <!-- TODO Post the form info to the payments page, where all the info will be saved in DB-->
        <button type="submit" form="delivery-info" class="btn btn-primary" {{$message[1]}}>Confirm order</button></br>
        <a href="{{url('/cart')}}" class="btn my-2" style="background: gray;">Back to cart</a>
    </div>
  </div>
</div>
</div>

<footer>
{{View::make('footer')}}
</footer>

<script>
        if("{{$message[1]}}" == "disabled") {
            alert('{{$message[0]}}\nRedirecting to browsing...');
            window.location.replace("{{url('browsing/All')}}");
        }
</script>
</body>
</html>
