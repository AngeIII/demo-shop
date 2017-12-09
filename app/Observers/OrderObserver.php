<?php

namespace App\Observers;

use App\Order;

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
