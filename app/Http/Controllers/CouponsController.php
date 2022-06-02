<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    public function index()
    {
        return Coupon::paginate(10);
    }

    public function show(Coupon $coupon)
    {
        return $coupon;
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:10',
            'discount_percentage' => 'required',
            'valid_till' => 'required|date',
            'code' => 'required|min:15|max:15'
        ]);

        $coupon = Coupon::create($attributes);

        if ($coupon == false) {
            return back()->with('success', 'coupon Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function update(Coupon $coupon)
    {

        $attributes = request()->validate([
            'name' => 'min:3|max:10',
            'valid_till' => 'date',
            'code' => 'min:15|max:15'
        ]);

        $coupon->update($attributes);

        if ($coupon == false) {
            return back()->with('success', 'coupon Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function destroy(Coupon $coupon)
    {

        $coupon->delete();

        return back()->with('success', 'coupon Deleted');
    }
}
