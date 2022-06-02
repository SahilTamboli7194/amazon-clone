<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderStatusesController extends Controller
{
    public function index()
    {
        return OrderStatus::paginate(10);
    }

    public function show(OrderStatus $orderStatus)
    {
        return $orderStatus;
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:10'
        ]);

        $orderStatus = OrderStatus::create($attributes);

        if ($orderStatus == false) {
            return back()->with('success', 'Order Status Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function update(OrderStatus $orderStatus)
    {

        $attributes = request()->validate([
            'name' => 'min:3|max:10'
        ]);

        $orderStatus->update($attributes);

        if ($orderStatus == false) {
            return back()->with('success', 'Order Status Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function destroy(OrderStatus $orderStatus)
    {

        $orderStatus->delete();

        return back()->with('success', 'Order Status Deleted');
    }
}
