<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort') ?: 'created_at,desc';
        $type = $request->input('type') ?: '0';
        $data = explode(',', $sort);
        $key = $data[0];
        $by = isset($data[1]) ? $data[1] : 'asc';
        $builder = Order::with('user')
            ->with('product')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->select('orders.*')
            ->orderBy($key, $by);
        switch ($type) {
            case '1':
                // Last 7 Days
                $carbon = Carbon::today()->subDays(7)->toDateTimeString();
                $builder->whereDate('orders.created_at', '>=', $carbon);
                break;
            case '2':
                // Today
                $carbon = Carbon::today()->toDateTimeString();
                $builder->whereDate('orders.created_at', '>=', $carbon);
                break;
        }

        $builder = $this->manageSearch(
            $request,
            $builder,
            ['user.name', 'product.name']
        );

        $items = $builder->paginate(10);

        return view('orders.list')->with(['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Order::$validationRules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Order::create($request->only(['user_id', 'product_id', 'count']));

        Session::flash('alert-success', 'Successfully created the order!');

        return redirect()->route('orders.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit')->with(['item' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $validator = Validator::make($request->all(), Order::$validationRules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $order->update($request->only(['user_id', 'product_id', 'count']));

        Session::flash('alert-success', 'Successfully updated the order!');

        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order $order
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if ($order->delete()) {
            Session::flash('alert-success', 'Order successfully removed!');
        } else {
            Session::flash('alert-danger', 'Failed to remove order!');
        }

        return redirect()->back();
    }

    public function getTotal(Request $request)
    {
        $product = Product::findOrFail($request->product);
        $count = intval($request->count);
        $sum = $product->price * $count; // default sum

        $data = [
            'product' => $product,
            'count' => $count,
            'sum' => &$sum,
        ];

        // For extras
        Event::fire(
            'order.total',
            $data
        );

        return [
            'total' => round($data['sum'], 2),
        ];
    }
}
