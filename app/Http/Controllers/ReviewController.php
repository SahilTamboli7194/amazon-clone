<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        return Review::paginate(10);
    }

    public function show(Review $review){
        return $review;
    }

    public function store(){
        $attributes= request()->validate([
            'body'=>'required|min:3|max:10'
        ]);

        $review = Review::create([
            'body'=>$attributes['body'],
            'user_id'=>'user_id',
            'prodcut_id'=>$attributes['prodcut_id']
        ]);

        if($review==false){
            return back()->with('success','Review Added Successfully');
        }

        return back()->with('error','something went wrong');
    }

    public function update(Review $review){

        $attributes= request()->validate([
            'name'=>'min:3|max:10'            
        ]);

        $review->update($attributes);

        if($review==false){
            return back()->with('success','Review Added Successfully');
        }

        return back()->with('error','something went wrong');
    }

    public function delete(Review $review){

        $review->delete();

        return back()->with('success','Review Deleted');
    }
}
