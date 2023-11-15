
@extends('base')
@section('body')

<div class="container">
    <h1>Create a New Food Item</h1>
    <form action="{{ route('foods.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <textarea name="ingredients" id="ingredients" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" name="img" id="img" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

@endsection
