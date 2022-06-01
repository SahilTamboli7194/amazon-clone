<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    public function index(){
        return OrderStatus::paginate(10);
    }

    public function show(OrderStatus $order_status){
        return $order_status;
    }

    public function store(){
        $attributes= request()->validate([
            'name'=>'required|min:3|max:10'
        ]);

        $order_status = OrderStatus::create($attributes);

        if($order_status==false){
            return back()->with('success','Order Status Added Successfully');
        }

        return back()->with('error','something went wrong');
    }

    public function update(OrderStatus $order_status){

        $attributes= request()->validate([
            'name'=>'min:3|max:10'
        ]);

        $order_status->update($attributes);

        if($order_status==false){
            return back()->with('success','Order Status Added Successfully');
        }

        return back()->with('error','something went wrong');
    }

    public function delete(OrderStatus $order_status){

        $order_status->delete();

        return back()->with('success','Order Status Deleted');
    }
}
