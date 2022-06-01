<?php

namespace App\Http\Controllers;

use App\Models\ColorProduct;
use Illuminate\Http\Request;

class ColorProductController extends Controller
{
    public function index(){
        return ColorProduct::paginate(10);
    }

    public function show($color_product){

       // return $color_product;
          return ColorProduct::find($color_product);
       
    }

   public function delete(ColorProduct $color_product){

    $color_product->delete();
    return back()->with('success','Color Product  Deleted');
   }

}
