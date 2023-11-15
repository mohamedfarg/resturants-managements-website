
@extends('base')
@section('body')

<div class="container">
    <h1>update Food Item</h1>
    <form action="{{ route('foods.update',['id'=>$food->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $food->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"  required>{{ $food->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ $food->price }}" required>
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <textarea name="ingredients" id="ingredients" class="form-control" required>{{ $food->ingredients }}</textarea>
        </div>

         <div class="form-group">
            <label for="img">Image</label>
            <input type="file" name="img" id="img" class="form-control-file" src="{{ $food->img }}">
        </div>


        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
