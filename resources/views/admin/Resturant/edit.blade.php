@extends('base')
@section('body')

<div class="container my-5">
    <h1>Create a New Restaurant</h1>
    <form action="{{ route('resturants.update',['id'=>$resturant->id]) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="form-group my-3">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $resturant->name }}">
        </div>
        <div class="form-group my-3">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $resturant->address }}">
        </div>
        <div class="form-group my-3">
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ $resturant->phone_number }}">
        </div>
        <div class="form-group my-3">
            <label for="website">Website:</label>
            <input type="text" name="website" id="website" class="form-control" value="{{ $resturant->website }}">
        </div>
        <div class="form-group my-3">
            <label for="description">description:</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $resturant->description }}"</textarea>

        </div>
        <div class="form-group my-3">
            <label for="img">Image</label>
            <input type="file" name="img" id="img" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Create Restaurant</button>
    </form>
</div>
@endsection
