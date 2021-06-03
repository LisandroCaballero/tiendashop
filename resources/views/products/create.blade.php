@extends('layouts.app')
@section('content')
<h1>Create a product</h1>
<form method="POST" action="{{ route('products.store') }}">
    @csrf
    <div class="form-row">
        <label>Title</label>
        <input class="form-control" type="text" name="title" value="{{old('title')}}" required>
    </div>
    <div class="form-row">
        <label>Description</label>
        <input type="text" class="form-control" name="description" value="{{old('description')}}" required>
    </div>
    <div class="form-row">
        <label>Price</label>
        <input type="number" min="1.00" step="0.01" class="form-control" name="price" value="{{old('price')}}" required>
    </div>
    <div class="form-row">
        <label>Stock</label>
        <input type="number" min="0" class="form-control" name="stock" value="{{old('stock')}}" required>
    </div>
    <div class="form-row">
        <label>Status</label>
        <select class="custom-select" name="status" required>
            <option value="" selected>Select...</option>
            <option {{old('status') == 'available' ? 'selected' : ''}} value="available">Available</option>
            <option {{old('status') == 'unavailable' ? 'selected' : ''}} value="unavailable">Unavailable</option>
        </select>
    </div>
    <div class="form-row mt-3">
        <button type="submit" class="btn btn-primary btn-lg">Create Product</button>
    </div>
</form>
@endsection
