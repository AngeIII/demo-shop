<?php

namespace Tests\Feature;

use App\Order;
use App\Product;
use App\User;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function testOrderCreation()
    {
        $user = User::first();
        $product = Product::first();
        $expectedSum = $product->price * 10;
        $order = Order::create(
            [
                'product_id' => $product->id,
                'user_id' => $user->id,
                'count' => 10,
            ]
        );

        $this->assertEquals($expectedSum, $order->sum);
    }

    public function testOrderExtraOfferCreation()
    {
        $user = User::first();
        $product = Product::where('name', '=', 'Pepsi Cola')->first();
        $expectedSum = $product->price * 10 * 0.8; // 20% off
        $order = Order::create(
            [
                'product_id' => $product->id,
                'user_id' => $user->id,
                'count' => 10,
            ]
        );

        $this->assertEquals($expectedSum, $order->sum);
    }

    public function testOrderExtraOfferCreationWithoutDiscount()
    {
        $user = User::first();
        $product = Product::where('name', '=', 'Pepsi Cola')->first();
        $expectedSum = $product->price * 2;
        $order = Order::create(
            [
                'product_id' => $product->id,
                'user_id' => $user->id,
                'count' => 2,
            ]
        );

        $this->assertEquals($expectedSum, $order->sum);
    }
}
