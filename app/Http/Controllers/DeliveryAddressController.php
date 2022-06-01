<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAddress;
use Illuminate\Http\Request;

class DeliveryAddressController extends Controller
{
    public function index(){
        return DeliveryAddress::paginate(10);
    }

    public function show(DeliveryAddress $delivery_address){
        return $delivery_address;
    }

    public function store(){
        $attributes= request()->validate([
            'body'=>'required|min:3|max:10',
            'address_type'=>'required'
        ]);

        $delivery_address = DeliveryAddress::create($attributes);

        if($delivery_address==false){
            return back()->with('success','Delivery Address Added Successfully');
        }

        return back()->with('error','something went wrong');
    }

    public function update(DeliveryAddress $delivery_address){

        $attributes= request()->validate([
            'body'=>'required|min:3|max:10'          
        ]);

        $delivery_address->update($attributes);

        if($delivery_address==false){
            return back()->with('success','Delivery Address Added Successfully');
        }

        return back()->with('error','something went wrong');
    }

    public function delete(DeliveryAddress $delivery_address){

        $delivery_address->delete();

        return back()->with('success','Delivery Address Deleted');
    }
}
