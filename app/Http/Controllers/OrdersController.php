<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        return $this->getAuthUser()->orders()->paginate(10);
    }

    public function show(Order $order)
    {
        return $this->authorize('view', $order);

        //return $order;
    }

    public function store()
    {
        $attributes = request()->validate();

        $order = Order::create($attributes);

        if ($order == false) {
            return back()->with('success', 'Delivery Address Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function destroy(Order $order)
    {

        $order->delete();

        return back()->with('success', 'Delivery Address Deleted');
    }
}
