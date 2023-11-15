@extends('base')
@include('layouts.navbar')

@section('body')

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

            <form action="{{ route("search") }}" method="GET">
                <input type="search" name="key" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">{{ trans('translation.Explore Categories') }}</h2>
            @foreach ($categories as $category)

            <a href="{{ route('category',['id'=>$category->id]) }}">
                <div class="box-3 float-container">
                    <img src="{{ asset('storage/' . $category->img) }}" alt="Pizza" class="resize">

                    <h3 class="float-text text-white">{{ $category->name }}</h3>
                </div>
            </a>
            @endforeach


        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->

<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">{{ trans('translation.Popular Food') }}</h2>

        @foreach ($resturants as $resturant )
        <div class="food-menu-box ">


            <div class="food-menu-img">
                    <img src="{{ asset('storage/' . $resturant->img) }}" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                </div>

                <div class="food-menu-desc">
                    <h4>{{ $resturant->name }}</h4>
                    {{-- <p class="food-price">${{ $resturant->description }}</p> --}}
                    <p class="food-detail">
                        {{ $resturant->description }}
                    </p>
                    <br>

                    <a href="{{ Route('resturant',['id'=> $resturant->id]) }}" class="btn btn-primary">View</a>
                </div>
            </div>
            @endforeach



            <div class="clearfix"></div>



        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="{{ asset('https://img.icons8.com/fluent/50/000000/facebook-new.png') }}"/></a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('https://img.icons8.com/fluent/48/000000/instagram-new.png') }}"/></a>
                </li>
                <li>
                    <a href="#"><img src="{{ asset('https://img.icons8.com/fluent/48/000000/twitter.png') }}"/></a>
                </li>
            </ul>
        </div>
 </section>
    <!-- social Section Ends Here -->

    @endsection
