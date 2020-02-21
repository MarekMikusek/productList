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
            <button type="submit" class="btn btn-primary rounded">Update</button>
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
