@extends('base')
@section('body')
@include('layouts.navbar')
<div class="container my-5">
    <a  role="button" class="btn btn-primary" href="{{  route('foods.create') }}"> create</a>
    <div class="row my-5">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
              <tr>
                  <th>Name</th>
                  <th>description</th>
                <th>ingrdents</th>
                <th>price</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($foods as $food)

                <tr>
                  <td>
                    <div class="d-flex align-items-center">

                      <img
                          src="{{ asset('storage/' . $food->img) }}"
                          alt="{{ $food->name }}"
                          style="width: 45px; height: 45px"
                          class="rounded-circle"
                          />
                      <div class="ms-3">
                        <p class="fw-bold mb-1">{{ $food->name }}</p>
                    </div>
                </div>
            </td>
            <td>
                      <p class="text-muted mb-0">{{ $food->description }}</p>

                    </td>
                    <td>
                      <p class="fw-normal mb-1">{{ $food->ingredients }}</p>
                  </td>
                  <td>{{ $food->price }}</td>
                  <td class='d-flex justify-content-between'>
                    <a type="button" href="{{ route('foods.edit',['id'=>$food->id]) }}" class="btn btn-success btn-sm p-3 ">
                      Edit
                    </a>
                    <form action="{{ route('foods.destroy', ['id' => $food->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm p-3" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>

</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    @elseif(session('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>



@endif

@endsection
