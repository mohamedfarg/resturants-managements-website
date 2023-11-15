@extends('base')
@section('body')
@include('layouts.navbar')
<div class="container my-5">
    <a  role="button" class="btn btn-primary" href="{{  route('resturants.create') }}"> create</a>
    <div class="row my-5">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
              <tr>
                  <th>Name</th>
                  <th>description</th>
                <th>adress</th>
                <th>phone</th>
                <th>website</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($resturants as $resturant)

                <tr>
                  <td>
                    <div class="d-flex align-items-center">

                      <img
                          src="{{ asset('storage/' . $resturant->img) }}"
                          alt="{{ $resturant->name }}"
                          style="width: 45px; height: 45px"
                          class="rounded-circle"
                          />
                      <div class="ms-3">
                        <p class="fw-bold mb-1">{{ $resturant->name }}</p>
                    </div>
                </div>
            </td>
            <td>
                      <p class="text-muted mb-0">{{ $resturant->description }}</p>

                    </td>
                    <td>
                      <p class="fw-normal mb-1">{{ $resturant->address }}</p>
                  </td>

                    <td>
                      <p class="fw-normal mb-1">{{ $resturant->phone_number }}</p>
                  </td>
                    <td>
                      <p class="fw-normal mb-1">{{ $resturant->website }}</p>
                  </td>

                  <td class='d-flex justify-content-between'>
                    <a type="button" href="{{ route('resturants.edit',['id'=>$resturant->id]) }}" class="btn btn-success btn-sm p-3 ">
                      Edit
                    </a>
                    <form action="{{ route('resturants.destroy', ['id' => $resturant->id]) }}" method="POST">
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
