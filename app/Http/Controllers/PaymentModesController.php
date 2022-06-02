<?php

namespace App\Http\Controllers;

use App\Models\PaymentMode;
use Illuminate\Http\Request;

class PaymentModesController extends Controller
{
    public function index()
    {
        return PaymentMode::paginate(10);
    }

    public function show(PaymentMode $paymentMode)
    {
        return $paymentMode;
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:10'
        ]);

        $paymentMode = PaymentMode::create($attributes);

        if ($paymentMode == false) {
            return back()->with('success', 'Payment Mode Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function update(PaymentMode $paymentMode)
    {

        $attributes = request()->validate([
            'name' => 'min:3|max:10'
        ]);

        $paymentMode->update($attributes);

        if ($paymentMode == false) {
            return back()->with('success', 'Payment Mode Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function destroy(PaymentMode $paymentMode)
    {

        $paymentMode->delete();

        return back()->with('success', 'Payment Mode Deleted');
    }
}
