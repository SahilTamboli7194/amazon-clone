<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    public function index()
    {
        return Color::paginate(10);
    }

    public function show(Color $color)
    {
        return $color;
    }

    public function create()
    {
        return 'create color';
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|min:3|max:10'
        ]);

        $color = Color::create($attributes);

        if ($color == false) {
            return back()->with('success', 'color Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function edit(Color $color)
    {
        return "edit" . $color;
    }

    public function update(Color $color)
    {

        $attributes = request()->validate([
            'name' => 'min:3|max:10'
        ]);

        $color->update($attributes);

        if ($color == false) {
            return back()->with('success', 'color Added Successfully');
        }

        return back()->with('error', 'something went wrong');
    }

    public function destroy(Color $color)
    {

        $color->delete();

        return back()->with('success', 'color Deleted');
    }
}
