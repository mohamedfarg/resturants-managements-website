<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{FoodController,ResturantController,CategoryController,OrderController,OrderItemController};

Route::middleware(['auth'])->group(function () {
    Route::get('/restaurants', [ResturantController::class, 'index'])->name('restaurants.index');
    Route::get('/restaurants/create', [ResturantController::class, 'create'])->name('resturants.create');
    Route::get('/restaurants/show,{id}', [ResturantController::class, 'show'])->name('resturants.show');
    Route::post('/restaurants', [ResturantController::class, 'store'])->name('resturants.store');
    Route::get('/restaurants/{id}/edit', [ResturantController::class, 'edit'])->name('resturants.edit');
    Route::put('/restaurants/update/{id}', [ResturantController::class, 'update'])->name('resturants.update');
    Route::delete('/restaurants/delete/{id}', [ResturantController::class, 'destroy'])->name('resturants.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/foods', [FoodController::class, 'index'])->name('foods.index');
    Route::get('/foods/create', [FoodController::class, 'create'])->name('foods.create');
    Route::get('/foods/show/{id}', [FoodController::class, 'show'])->name('foods.show');
    Route::post('/foods', [FoodController::class, 'store'])->name('foods.store');
    Route::get('/foods/{id}/edit', [FoodController::class, 'edit'])->name('foods.edit');
    Route::put('/foods/update/{id}', [FoodController::class, 'update'])->name('foods.update');
    Route::delete('/foods/delete/{id}', [FoodController::class, 'destroy'])->name('foods.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/orders_items', [OrderItemController::class, 'index'])->name('orders_items.index');
    Route::get('/orders_items/create', [OrderItemController::class, 'create'])->name('orders_items.create');
    Route::get('/orders_items/{id}', [OrderItemController::class, 'show'])->name('orders_items.show');
    Route::post('/orders_items', [OrderItemController::class, 'store'])->name('orders_items.store');
    Route::get('/orders_items/{id}/edit', [OrderItemController::class, 'edit'])->name('orders_items.edit');
    Route::put('/orders_items/{id}', [OrderItemController::class, 'update'])->name('orders_items.update');
    Route::delete('/orders_items/{id}', [OrderItemController::class, 'destroy'])->name('orders_items.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
});
// Route::middleware(['auth'])->group(function () {
//     Route::get('/menu_items', [MenuItemController::class, 'index'])->name('menu_items.index');
//     Route::get('/menu_items/create', [MenuItemController::class, 'create'])->name('menu_items.create');
//     Route::post('/menu_items', [MenuItemController::class, 'store'])->name('menu_items.store');
//     Route::get('/menu_items/{id}', [MenuItemController::class, 'show'])->name('menu_items.show');
//     Route::get('/menu_items/{id}/edit', [MenuItemController::class, 'edit'])->name('menu_items.edit');
//     Route::put('/menu_items/{id}', [MenuItemController::class, 'update'])->name('menu_items.update');
//     Route::delete('/menu_items/{id}', [MenuItemController::class, 'destroy'])->name('menu_items.destroy');
// });
