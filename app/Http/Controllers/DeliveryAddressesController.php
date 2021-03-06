<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAddress;
use Illuminate\Http\Request;

class DeliveryAddressesController extends Controller
{
    public function index()
    {
        //return DeliveryAddress::paginate(10);

        return $this->getAuthUser()->deliveryAddresses()->paginate(10);
    }

    public function show(DeliveryAddress $deliveryAddress)
    {
        return $deliveryAddress;
    }

    public function store()
    {

        $attributes = request()->validate([
            'body' => 'required|min:3|max:10',
            'address_type' => 'required'
        ]);

        $deliveryAddress = DeliveryAddress::create($attributes);

        if ($deliveryAddress == true) {
            return back()->with('success', 'Delivery Address Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function update(DeliveryAddress $deliveryAddress)
    {

        if ($this->getAuthUser()->cannot('update', $deliveryAddress)) {
            abort(403);
        }
        $attributes = request()->validate([
            'body' => 'required|min:3|max:10'
        ]);

        $deliveryAddress->update($attributes);

        if ($deliveryAddress == true) {
            return back()->with('success', 'Delivery Address Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function destroy(DeliveryAddress $deliveryAddress)
    {
        if ($this->getAuthUser()->cannot('delete', $deliveryAddress)) {
            abort(403);
        }
        $deliveryAddress->delete();

        return back()->with('success', 'Delivery Address Deleted');
    }
}
