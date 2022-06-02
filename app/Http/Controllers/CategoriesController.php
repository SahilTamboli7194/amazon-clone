<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return Category::paginate(10);
    }

    public function show(Category $category)
    {
        return $category;
    }

    public function create()
    {
        return 'create category';
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:10'
        ]);

        $category = Category::create($attributes);

        if ($category == false) {
            return back()->with('success', 'Category Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function edit(Category $category)
    {
        return "edit " . $category->name;
    }

    public function update(Category $category)
    {

        $attributes = request()->validate([
            'name' => 'min:3|max:10'
        ]);

        $category->update($attributes);

        if ($category == false) {
            return back()->with('success', 'Category Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function destroy(Category $category)
    {

        $category->delete();

        return back()->with('success', 'Category Deleted');
    }
}
