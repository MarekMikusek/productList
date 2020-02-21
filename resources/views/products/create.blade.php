@extends('layouts.app')

@section('content')
<div class="container container-fluid">
    <h3>Add new product</h3>
    <div class="bg-light h mt-5">
        <form method="POST" action="/products">
            @csrf
            <div class="form-group">
                <label for="name_input">Product name</label>
                <input type="text" class="form-control rounded" id="name_input" aria-describedby="name" name="name" placeholder="Enter product name" value="{{ old('name') }}">
                @error('name') <p class="text-red text-small">{{ $message }}</p> @enderror
            </div>
            <div class="form-group">
                <label for="product_description">Product description</label>
                <input type="text" class="form-control  rounded" id="product_description" name="description" placeholder="Enter product description" value="{{  old('description') }}">
                @error('description') <p class="text-red text-small">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="btn btn-primary rounded">Add</button>
        </form>
    </div>
    <div class="mt-5">
        <a href="/products">
            <button class="btn btn-success">Show product list</button>
        </a>
    </div>
</div>
@endsection
