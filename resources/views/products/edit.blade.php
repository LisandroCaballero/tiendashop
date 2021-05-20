@extends('layouts.master')
@section('content')
<h1>Edit a product</h1>
<form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
    @csrf
    @method('PUT')
    <div class="form-row">
        <label>Title</label>
        <input class="form-control" type="text" name="title" value="{{$product->title}}" required>
    </div>
    <div class="form-row">
        <label>Description</label>
        <input type="text" class="form-control" name="description" value="{{$product->description}}" required>
    </div>
    <div class="form-row">
        <label>Price</label>
        <input type="number" min="1.00" step="0.01" class="form-control" name="price" value="{{$product->price}}" required>
    </div>
    <div class="form-row">
        <label>Stock</label>
        <input type="number" min="0" class="form-control" name="stock" value="{{$product->stock}}" required>
    </div>
    <div class="form-row">
        <label>Status</label>
        <select class="custom-select" name="status" required>
            <option {{$product->status == 'available' ? 'selected' : ''}} value="available">Available</option>
            <option {{$product->status == 'unavailable' ? 'selected' : ''}} value="unavailable">Unavailable</option>
        </select>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lg">Edit Product</button>
    </div>
</form>
@endsection
