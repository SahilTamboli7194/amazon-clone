<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(){
        return Offer::paginate(10);
    }

    public function show(Offer $offer){
        return $offer;
    }

    public function create(){
        return 'create offer';
    }

    public function store(){
        $attributes= request()->validate([
            'name'=>'required|min:3|max:10',
            'discount_percentage'=>'required',
            'valid_till'=>'required|date'
        ]);

        $offer = Offer::create($attributes);

        if($offer==false){
            return back()->with('success','offer Added Successfully');
        }

        return back()->with('error','something went wrong');
    }

    public function update(Offer $offer){

        $attributes= request()->validate([
            'name'=>'min:3|max:10',
            'valid_till'=>'date'
        ]);

        $offer->update($attributes);

        if($offer==false){
            return back()->with('success','offer Added Successfully');
        }

        return back()->with('error','something went wrong');
    }

    public function delete(Offer $offer){

        $offer->delete();

        return back()->with('success','offer Deleted');
    }
}
