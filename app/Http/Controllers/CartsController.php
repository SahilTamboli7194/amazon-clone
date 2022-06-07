<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index()
    {
        //return Cart::paginate(10);
        return $this->getAuthUser()->cart();
    }

    public function show(Cart $cart)
    {
        return $this->authorize('view', $cart);
        //return $cart;
    }

    public function create()
    {
        return 'create cart';
    }

    public function store()
    {
        $attributes = request()->validate([
            'user_id' => 'required|min:3|max:10'
        ]);

        $cart = Cart::create($attributes);

        if ($cart == false) {
            return back()->with('success', 'cart Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }


    public function destroy(cart $cart)
    {

        if ($this->getAuthUser()->cannot('delete', $cart)) {
            abort(403);
        }
        $cart->delete();

        return back()->with('success', 'cart Deleted');
    }
}
