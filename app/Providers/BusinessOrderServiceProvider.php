<?php

namespace App\Http\Controllers\Shop\Extra;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class BusinessOrderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Event::listen(
            'order.total',
            function ($product, $count, &$sum) {
                /** @var \App\Product $product */
                if ($product->name === 'Pepsi Cola' && $count >= 3) {
                    $sum = $sum * 0.8; // 20% off
                }
            }
        );
    }
}
