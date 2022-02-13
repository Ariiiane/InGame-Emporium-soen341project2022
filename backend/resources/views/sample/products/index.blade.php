@extends('sample.products.layout')

@section('content')
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Products</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}">Add Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Department</th>
            <th>Manufacturer</th>
            <th>Price</th>
            <th>Unit</th>
            <th>Format</th>
            <th>Inventory (Stock)</th>
            <th>Image Path</th>
            <th width="280px">Actions</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->product_id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->department }}</td>
                <td>{{ $product->manufacturer }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->unit }}</td>
                <td>{{ $product->format }}</td>
                <td>{{ $product->inventory }}</td>
                <td><img src="{{url('')}}{{ $product->image_path }}" alt="{{ $product->image_path }}"></td>

                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection