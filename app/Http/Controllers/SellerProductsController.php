<?php

namespace App\Http\Controllers;

use App\Models\SellerProduct;
use Illuminate\Http\Request;

class SellerProductsController extends Controller
{
    public function index()
    {
        return SellerProduct::paginate(10);
    }

    public function show(SellerProduct $sellerProduct)
    {
        return $sellerProduct;
    }

    public function create()
    {
        return 'add sellers to prodcut';
    }

    public function store()
    {

        $attributes = request()->validate([
            'product_id' => 'required'
        ]);

        $sellerProduct = SellerProduct::create($attributes);

        if ($sellerProduct == true) {
            return back()->with('success', 'Seller Product Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function edit(SellerProduct $sellerProduct)
    {
        $attributes = request();

        $sellerProduct->update($attributes);

        if ($sellerProduct == true) {
            return back()->with('success', 'Seller Product updated Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function destroy(SellerProduct $sellerProduct)
    {
        $sellerProduct->delete();
        return back()->with('success', 'Seller Product deleted Successfully');
    }
}
