<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index()
    {
        return Brand::paginate(10);
    }

    public function show(Brand $brand)
    {
        return $brand;
    }

    public function create()
    {
        return 'create brand';
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:10'
        ]);

        $brand = Brand::create($attributes);

        if ($brand == false) {
            return back()->with('success', 'brand Successfully Added');
        }

        return back()->with('error', 'something went wrong');
    }

    public function edit(Brand $brand)
    {
        return 'edit' . $brand;
    }

    public function update(Brand $brand)
    {

        $attributes = request()->validate([
            'name' => 'min:3|max:10'
        ]);

        $brand->update($attributes);

        if ($brand == false) {
            return back()->with('success', 'brand Successfully updated');
        }

        return back()->with('error', 'something went wrong');
    }

    public function destroy(Brand $brand)
    {

        $brand->delete();

        return back()->with('success', 'brand Deleted');
    }
}
