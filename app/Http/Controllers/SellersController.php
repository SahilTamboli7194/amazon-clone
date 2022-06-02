<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellersController extends Controller
{
    public function index()
    {
        return Seller::paginate(10);
    }

    public function show(Seller $seller)
    {
        return $seller;
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:10',
            'address' => 'required|min:10|max:250'
        ]);

        $seller = Seller::create($attributes);

        if ($seller == false) {
            return back()->with('success', 'Seller Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function update(Seller $seller)
    {

        $attributes = request()->validate([
            'name' => 'min:3|max:10',
            'address' => 'min:10|max:250'
        ]);

        $seller->update($attributes);

        if ($seller == false) {
            return back()->with('success', 'Seller Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function destroy(Seller $seller)
    {

        $seller->delete();

        return back()->with('success', 'Seller Deleted');
    }
}
