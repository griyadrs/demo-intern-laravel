@extends('layouts.app')

@section('content')
    <h2>Add Product</h2>
    <form action="{{route('products.store')}}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Name Product:</label>
            <input type="text" class="form-control" id="name" name="name"  >
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" class="form-control" id="price" name="price"  required>
            @if ($errors->has('price'))
                <span class="text-danger">{{ $errors->first('price') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" class="form-control" id="stock" name="stock"  required>
            @if ($errors->has('stock'))
                <span class="text-danger">{{ $errors->first('stock') }}</span>
            @endif
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Store</button>
    </form>
@endsection