@extends('base')
@include('layouts.navbar')
@section('body')




    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            @foreach ($foods as $food)
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="{{ asset('storage/' . $food->img) }}" alt="{{ $food->name }}" class="img-responsive img-curve">

                </div>

                    <div class="food-menu-desc">
                        <h4>{{ $food->name }}</h4>
                        <p class="food-price">${{ $food->price }}</p>
                        <p class="food-detail">
                            {{ $food->description }}
                        </p>
                        <br>

                        <a href="#" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
                @endforeach



            <div class="clearfix"></div>



        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

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
