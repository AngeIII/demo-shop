<?php

// Main orders
Route::resource('/', '\App\Http\Controllers\Shop\OrderController');
Route::resource('/orders', '\App\Http\Controllers\Shop\OrderController')->only(
    ['index', 'create', 'delete', 'store', 'edit', 'update', 'destroy']
);
Route::get('/orders/total', '\App\Http\Controllers\Shop\OrderController@getTotal');