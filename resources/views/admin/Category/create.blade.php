@extends('base')
@section('body')
<div class="container my-5">
    <h1>Create a New Category</h1>
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group my-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>


        <div class="form-group my-3">
            <label for="img">Image</label>
            <input type="file" name="img" id="img" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection

