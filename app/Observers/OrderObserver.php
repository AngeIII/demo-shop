<?php

namespace App\Observers;

use App\Bundle;
use App\Order;
use Illuminate\Support\Facades\Storage;
use App\Jobs\BuildBundleZip;

class OrderObserver
{
    public function creating(Order $order)
    {
        // get order product
        $product = $order->product;
        $count = $order->count;
        $sum = $product->price * $count;

        // Set Sum for order
        $order->sum = round($sum, 2);
    }

    public function updating(Order $order)
    {
        // get order product
        $product = $order->product;
        $count = $order->count;
        $sum = $product->price * $count;

        // Set Sum for order
        $order->sum = round($sum, 2);
    }
}
