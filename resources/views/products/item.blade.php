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
        <a href = "{{ url('')}}/{{ $ad->ad_link }} "><img src="{{ url('')}}/{{ $ad->ad_image_path }}"></a>
    </div>
</div>
@endsection