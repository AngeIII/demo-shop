<?php

namespace App\Observers\Extra;

use App\Order;

class BusinessOrderObserver
{
    public function creating(Order $order)
    {
        // get order product
        $product = $order->product;
        $count = $order->count;
        if ($product->name === 'Pepsi Cola' && $count >= 3) {
            $order->sum = round($order->sum * 0.8, 2); // 20% off
        }
    }

    public function updating(Order $order)
    {
        // get order product
        $product = $order->product;
        $count = $order->count;
        if ($product->name === 'Pepsi Cola' && $count >= 3) {
            $order->sum = round($order->sum * 0.8, 2); // 20% off
        }
    }
}
