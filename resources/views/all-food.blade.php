
@extends('base')
@include('layouts.navbar')
@section('body')

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            @foreach ($foods as $food)

            <a href="{{ route("add_cart",['id' => $food->id]) }}">
            <div class="box-3 float-container">
                <img src="{{ asset("storage/" . $food->img) }}" alt="Pizza" class="resize">

                <h3 class="float-text text-white">{{ $food->name }}</h3>
            </div>
            </a>
            @endforeach


            <div class="clearfix"></div>
        </div>
        {{-- pagination --}}
        <div class="d-flex justify-content-center">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($foods->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link">Previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $foods->previousPageUrl() }}" rel="prev">Previous</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @for ($i = 1; $i <= $foods->lastPage(); $i++)
                    <li class="page-item{{ $foods->currentPage() === $i ? ' active' : '' }}">
                        <a class="page-link" href="{{ $foods->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                {{-- Next Page Link --}}
                @if ($foods->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $foods->nextPageUrl() }}" rel="next">Next</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">Next</span>
                    </li>
                @endif
            </ul>
        </div>

    </section>
    <!-- Categories Section Ends Here -->


    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>

        </div>
    </section>
    <!-- social Section Ends Here -->
@endsection
