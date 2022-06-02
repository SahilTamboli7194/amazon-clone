<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use Illuminate\Http\Request;

class CartProductsController extends Controller
{
    public function index()
    {
        return CartProduct::paginate(10);
    }

    public function show(CartProduct $cartProduct)
    {
        return $cartProduct;
    }

    public function store()
    {
        $attributes = request()->validate([
            'qunatity' => 'required|min:1'
        ]);

        CartProduct::create([
            'qunatity' => $attributes['qunatity'],
            'product_id' => $attributes['product_id'],
            'user_id' => $attributes['user_id']
        ]);

        return back()->with('success', 'Your Order Successfully Placed');
    }

    public function destroy(CartProduct $cartProduct)
    {
        return back()->with('success', 'Your Order Successfully Placed');
    }
}
