@extends('base')
@section('body')

<div class="container my-5">
    <h1>Create a New Restaurant</h1>
    <form action="{{ route('resturants.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="form-group my-3">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group my-3">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group my-3">
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control">
        </div>
        <div class="form-group my-3">
            <label for="website">Website:</label>
            <input type="text" name="website" id="website" class="form-control">
        </div>
        <div class="form-group my-3">
            <label for="description">description:</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>

        </div>
        <div class="form-group my-3">
            <label for="img">Image</label>
            <input type="file" name="img" id="img" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Create Restaurant</button>
    </form>
</div>
@endsection
