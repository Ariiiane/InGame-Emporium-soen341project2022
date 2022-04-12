@extends('products.layout')
@section('content')
    <div style="text-align:center">
        <div class="card" style="text-align:center">
            <div class="card-body">
                <h5 class="card-title">Upload your advertisement here</h5> </br>
                <div style="text-align:center">
                    <form action = "{{ url('') }}/seller/uploaded_file" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label for="product">What product is associated with your Advertisement:</label>
                        <select name="product" id="product">
                            @foreach ($products as $product)
                                <option value="{{ $product->product_id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <div class="form-group">
                            </br><label for="AdImage">Upload Advertisement image</label> </br>
                            </br><input type="file" class="form-control-file" id="exampleFormControlFile1" name = "AdImage">     
                        </div>
                        </br><input type="submit" name ="Submit" class="btn btn-primary"></br>  
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection