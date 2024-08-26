@extends('layouts.app')

@section('content')
    <h2>Detail Product</h2>
    <div>
        <strong>Name:</strong> {{ $product->name }}<br>
        <strong>Price:</strong> {{ $product->price }}<br>
        <strong>Stock:</strong> {{ $product->stock }}<br>
    </div>
    <br>
    <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Product List</a>
@endsection