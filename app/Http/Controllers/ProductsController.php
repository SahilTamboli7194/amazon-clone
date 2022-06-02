<?php

namespace App\Http\Controllers;

use App\Models\ColorProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);

        return $products;
    }

    public function show(Product $product)
    {

        return $product;
    }

    public function create()
    {
        return 'add product page';
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:50',
            'description' => 'required|min:10',
            'img_path' => 'required|image',
            'category' => 'required',
            'sub_category' => 'required',
            'brand' => 'required',
            'offer' => 'required'
        ]);

        $product = Product::create($attributes);

        $color = ColorProduct::create([
            'product_id' => $product->id,
            'color_id' => $attributes['color']
        ]);

        if ($color == false) {
            return back()->with('success', 'Prodcut Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function update(Product $product)
    {
        $attributes = request()->validate([
            'name' => 'min:3|max:50',
            'description' => 'min:10',
            'img_path' => 'image'
        ]);

        $product->update($attributes);

        return back()->with('success', 'Prodcut updated Successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Prodcut Deleted Successfully');
    }
}
