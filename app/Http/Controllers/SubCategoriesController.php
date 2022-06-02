<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    public function index()
    {
        return SubCategory::paginate(10);
    }

    public function show(SubCategory $sub_category)
    {

        return $sub_category;
    }

    public function create()
    {
        return 'create sub_category';
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:10',
            'category' => 'required'
        ]);

        $sub_category = SubCategory::create($attributes);

        if ($sub_category == false) {
            return back()->with('success', 'SubCategory Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function update(SubCategory $sub_category)
    {

        $attributes = request()->validate([
            'name' => 'min:3|max:10'
        ]);

        $sub_category->update($attributes);

        if ($sub_category == false) {
            return back()->with('success', 'SubCategory Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function destroy(SubCategory $sub_category)
    {

        $sub_category->delete();

        return back()->with('success', 'SubCategory Deleted');
    }
}
