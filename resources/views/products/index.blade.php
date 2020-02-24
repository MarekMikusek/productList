@extends('layouts.app')

@section('content')
<div class="container container-fluid">
    <h3>Product list</h3>
    @if(count($products)>0)
    @foreach($products as $product)
        <a href="/products/{{ $product->id }}" class="text-black"><p>{{ $product->name }}</p></a>
    @endforeach

    @else
        <p>Sorry, no product yet!</p>
    @endif
@if($is_authenticated)
    <a href="/products/create">
        <button class="btn btn-secondary">Add product</button>
    </a>
@endif
</div>
@endsection