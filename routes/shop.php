<?php

// Main orders
Route::resource('/', '\App\Http\Controllers\Shop\OrderController');
Route::resource('/orders', '\App\Http\Controllers\Shop\OrderController');
Route::resource('/products', '\App\Http\Controllers\Shop\ProductController')->only(['index', 'show']);