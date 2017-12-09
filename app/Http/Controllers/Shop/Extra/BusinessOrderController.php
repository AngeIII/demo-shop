<?php

namespace App\Http\Controllers\Shop\Extra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class BusinessOrderController extends Controller
{
    public function __construct()
    {
        Event::listen(
            'order.total',
            function ($data, Request $request) {
                /** @var \App\Product $product */
                $product = $data['product'];
                if ($product->name === 'Pepsi Cola' && $data['count'] >= 3) {
                    $data['sum'] = $data['sum'] * 0.8; // 20% off
                }
            }
        );
    }
}
