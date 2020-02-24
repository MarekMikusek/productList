@extends('layouts.app')

@section('content')
<div class="container container-fluid">
    <h3>Add new price</h3>
    <div class="bg-light h mt-5">
        <form method="POST" action="/prices/{{$product}}">
            @csrf
            <div class="form-group">
                <label for="name_input">Price name</label>
                <input type="text" class="form-control rounded" id="name_input" aria-describedby="name" name="name" placeholder="Enter product name" value="{{ old('name') }}">
                @error('name') <p class="text-red text-small">{{ $message }}</p> @enderror
            </div>
            <div class="form-group">
                <label for="price_value">Value</label>
                <input type="number" class="form-control  rounded" id="price_value" name="value" placeholder="Enter value" value="{{  old('value') }}">
                @error('value') <p class="text-red text-small">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="btn btn-primary rounded">Add</button>
        </form>
    </div>
    <div class="mt-5">
        <a href="/products/{{$product}}">
            <button class="btn btn-success">Show product</button>
        </a>
    </div>
</div>
@endsection
