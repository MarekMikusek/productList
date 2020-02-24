@extends('layouts.app')

@section('content')
<div class="container container-fluid">
    <h3>Edit product no {{ $product->id }}</h3>
    <div class="bg-light h mt-5">
        <form method="POST" action="/products/{{ $product->id }}">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name_input">Product name</label>
                <input type="text" class="form-control rounded" id="name_input" aria-describedby="name" name="name" placeholder="Enter product name" value="{{ $product['name'] }}">
                @error('name') <p class="text-red">{{ $message }}</p> @enderror
            </div>
            <div class="form-group">
                <label for="product_description">Product description</label>
                <input type="text" class="form-control  rounded" id="product_description" name="description" placeholder="Enter product description" value="{{ $product['description'] }}">
                @error('description') <p class="text-red">{{ $message }}</p> @enderror
            </div>
            <h3>Prices</h3>
            @foreach($product->prices as $price)
            <div class="row mb-3">
                <div class="col-4 form-inline">
                    <label for="price-name-{{$price->id}}" class="mr-3">Name</label>
                    <input type="text" class="form-control" id="price-name-{{$price->id}}" name="names[{{$price->id}}]" value = "{{$price->name}}">
                </div>
                <div class="col-4 form-inline">
                    <label for="price-value-{{$price->id}}" class="mr-3">Value</label>
                    <input type="number" class="form-control" id="price-value-{{$price->id}}" name="values[{{$price->id}}]" value="{{$price->value}}">
                </div>
            </div>
            @endforeach
            <div class="row">
            </div>
            <button type="submit" class="btn btn-primary rounded mt-5">Update product</button>
        </form> 
        <div class="mt-4">
        <a href="/prices/create/{{$product->id}}"><button class="btn btn-info rounded">Add price</button></a>
        </div>
        
    </div>


</form>
<div class="mt-4">
    <form action="/products/{{$product->id}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger rounded">Delete product</button>
    </form>
</div>
<div class="mt-4">
    <form action="/products" method="GET">
        @csrf
        <button type="submit" class="btn btn-dark rounded">Show product list</button>
    </form>
</div>


</div>
@endsection
