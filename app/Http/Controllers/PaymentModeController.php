<?php

namespace App\Http\Controllers;

use App\Models\PaymentMode;
use Illuminate\Http\Request;

class PaymentModeController extends Controller
{
    public function index(){
        return PaymentMode::paginate(10);
    }

    public function show(PaymentMode $payment_mode){
        return $payment_mode;
    }

    public function store(){
        $attributes= request()->validate([
            'name'=>'required|min:3|max:10'
        ]);

        $payment_mode = PaymentMode::create($attributes);

        if($payment_mode==false){
            return back()->with('success','Payment Mode Added Successfully');
        }

        return back()->with('error','something went wrong');
    }

    public function update(PaymentMode $payment_mode){

        $attributes= request()->validate([
            'name'=>'min:3|max:10'
        ]);

        $payment_mode->update($attributes);

        if($payment_mode==false){
            return back()->with('success','Payment Mode Added Successfully');
        }

        return back()->with('error','something went wrong');
    }

    public function delete(PaymentMode $payment_mode){

        $payment_mode->delete();

        return back()->with('success','Payment Mode Deleted');
    }
}
