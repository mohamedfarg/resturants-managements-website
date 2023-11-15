<?php

// use Illuminate\Support\Facades\Auth;
use App\Models\Resturant;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\{HomeController,CategoryController,CartController,ResturantController,OrderController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Auth::routes();

// Route::prefix('resturant')->group(function () {

//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });





// routes/web.php


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...

        Route::controller(HomeController::class)->group(function () {
            Route::get('/home', 'index')->name('home');


        });

        Route::controller(CategoryController::class)->group(function () {

            Route::get('/categories', 'index')->name('categories');
            Route::get('/category/{id}', 'category')->name('category');

        });



        Route::controller(FoodController::class)->group(function () {

            Route::get('/foods', 'index')->name('all_foods');
            Route::get('/search', 'search')->name('search');

        });
        Route::controller(CartController::class)->group(function () {

            Route::get('/cart','index')->name('show_cart');
            Route::get('/cart/add/{id}', 'add')->name('add_cart');
            Route::get('/cart/edit/{id}/{qty}', 'edit')->name('edit_cart');
            Route::get('/cart/remove/{id}', 'remove')->name('remove_cart');
            Route::get('/cart/destroy', 'destroy')->name('destroy_cart');

            //sss

        });
        Route::controller(ResturantController::class)->group(function () {



            Route::get('/resturant/{id}', 'resturant_details')->name('resturant');
        });

        Route::controller(OrderController::class)->group(function () {



            Route::get('/order', 'create_order')->name('create_order')->middleware('auth');
        });


    });

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/
