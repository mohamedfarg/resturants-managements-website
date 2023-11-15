@extends('base')
@section('body')
@include('layouts.navbar')
<div class="container my-5">
    <a  role="button" class="btn btn-primary" href="{{  route('resturants.create') }}"> create</a>
    <div class="row my-5">
        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
              <tr>
                  <th>type</th>
                  <th>user</th>
                <th>status</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)

                <tr>
                  <td>
                    <div class="d-flex align-items-center">

                      <div class="ms-3">
                        <p class="fw-bold mb-1">{{ $order->order_type }}</p>
                    </div>
                </div>
            </td>

                    <td>
                      <p class="fw-normal mb-1">{{ $order->user_id }}</p>
                  </td>
                    <td>
                      <p class="fw-normal mb-1">{{ $order->status }}</p>
                  </td>

                  <td class='d-flex justify-content-between'>
                    <a type="button" href="{{ route('order_items',['id'=>$order->id]) }}" class="btn btn-success btn-sm p-3 ">
                      items
                    </a>

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
