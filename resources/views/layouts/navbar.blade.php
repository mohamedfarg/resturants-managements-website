<section class="navbar">
    <div class="container">
        <div class="logo col-md-6">
            <a href="{{ route('home') }}" title="Logo">
                <img src="{{ asset('images/logo.png') }}" alt="Restaurant Logo" >
            </a>
        </div>

        <div class="menu col-md-6">
            <ul>
                <li>
                    <a href="{{ route("home") }}">{{ trans('translation.home') }}</a>
                </li>
                <li>
                    <a href="{{ route("categories") }}">{{ trans('translation.categories') }}</a>
                </li>
                <li>
                    <a href="{{ route('all_foods') }}">{{ trans('translation.foods') }}</a>
                </li>
                <li>
                    <a href="{{ route('show_cart') }}">{{ trans('translation.cart') }}</a>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</section>
