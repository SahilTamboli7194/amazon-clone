<?php

namespace App\Http\Controllers;

use App\Models\ColorProduct;
use Illuminate\Http\Request;

class ColorProductsController extends Controller
{
    public function index()
    {
        return ColorProduct::paginate(10);
    }

    public function show(ColorProduct $colorProduct)
    {

        return $colorProduct;
    }

    public function destroy(ColorProduct $colorProduct)
    {

        $colorProduct->delete();
        return back()->with('success', 'Color Product  Deleted');
    }
}
