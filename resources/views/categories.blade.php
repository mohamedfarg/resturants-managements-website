
@extends('base')
@include('layouts.navbar')
@section('body')

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Categories</h2>
            @foreach ($categories as $category)

            <a href="{{ route('category',['id'=>$category->id]) }}">
            <div class="box-3 float-container">
                <img src="{{ asset("storage/" . $category->img) }}" alt="Pizza" class="resize">

                <h3 class="float-text text-white">{{ $category->name }}</h3>
            </div>
            </a>
            @endforeach



            <div class="clearfix"></div>
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
