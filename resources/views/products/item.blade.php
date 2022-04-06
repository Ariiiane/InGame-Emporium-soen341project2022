@extends('products.layout')
@section('content')
<div class="bg"></div>

<div class="row">
  <div class="col-8">
  <div class="row" style="margin-bottom: 20px;">
    
    <div class="col">
        <div class="card" style="width: 47rem;">
            <img src="{{url('')}}{{ $product->image_path }}" class="card-img-top" alt="{{ $product->image_path }}">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">
                    <div>Item description: {{ $product->description }}</div>
                    Price: ${{ $product->price }}
                    <div>Manufacturer: {{ $product->manufacturer }}</div>
                    Items left in stock: {{ $product->inventory}} {{ $product->unit}}
                    <div>Description: {{ $product->description }}</div>
                    Department: {{ $product->department}}
                </p>
                <form action="{{route('cart.create',[$product->id])}}" method="POST">
                    @method('POST')
                    @csrf
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                </form>
            </div>
        </div>
    </div>
    
</div>
</div>
    <div class="col-4">
        <div style="background:#F1F6FB;border:#D6DFD8 2px solid;vertical-align:middle;text-align:center;height:1000px;padding:78px 68px 78px 68px;color:#879F9F">
            <b>Advertise Here</b>
                <br/>Size 300X250<br/>
            <span style="font-size:small"> Ads go here</span>
        </div>
    </div>
</div>
@endsection