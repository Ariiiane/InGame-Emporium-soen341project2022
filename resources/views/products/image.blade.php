@extends('products.layout')
@section('content')
<div class="bg"></div>
<h1 class="text-center">{{ $department }}</h1>
<div class="row" style="margin-bottom: 20px;">
    @foreach ($products as $product)
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="{{url('')}}{{ $product->image_path }}" class="card-img-top" alt="{{ $product->image_path }}">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">
                    <div>{{ $product->description }}</div>
                    </br>
                    Price: ${{ $product->price }}
                    <div>Manufacturer: {{ $product->manufacturer }}</div>
                    items left in stock: ${{ $product->inventory}}
                </p>
                <form action="{{route('cart.create',[$product->id])}}" method="POST">
                    @method('POST')
                    @csrf
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
