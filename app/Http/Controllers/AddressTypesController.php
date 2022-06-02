<?php

namespace App\Http\Controllers;

use App\Models\AddressType;
use Illuminate\Http\Request;

class AddressTypesController extends Controller
{
    public function index()
    {
        return AddressType::paginate(10);
    }

    public function show(AddressType $addressType)
    {
        return $addressType;
    }

    public function create()
    {
        return 'create Address Type';
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:10'
        ]);

        $addressType = AddressType::create($attributes);

        if ($addressType == false) {
            return back()->with('success', 'Address Type Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function edit(AddressType $addressType)
    {
        return "edit address  ";
    }

    public function update(AddressType $addressType)
    {

        $attributes = request()->validate([
            'name' => 'min:3|max:10'
        ]);

        $addressType->update($attributes);

        if ($addressType == false) {
            return back()->with('success', 'Address Type Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function destroy(AddressType $addressType)
    {

        $addressType->delete();

        return back()->with('success', 'Address Type Deleted');
    }
}
