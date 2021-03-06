<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use Illuminate\Http\Request;

class OrderProductsController extends Controller
{
    public function index()
    {
        return OrderProduct::paginate(10);
    }

    public function show(OrderProduct $orderProduct)
    {
        return $orderProduct;
    }

    public function store()
    {
        $attributes = request()->validate([
            'qunatity' => 'required|min:1'
        ]);

        OrderProduct::create([
            'qunatity' => $attributes['qunatity'],
            'product_id' => $attributes['product_id'],
            'user_id' => $attributes['user_id']
        ]);

        return back()->with('success', 'Your Order Successfully Placed');
    }
}
