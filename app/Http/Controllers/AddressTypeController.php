<?php

namespace App\Http\Controllers;

use App\Models\AddressType;
use Illuminate\Http\Request;

class AddressTypeController extends Controller
{
    public function index(){
        return AddressType::paginate(10);
    }

    public function show(AddressType $address_type){
        return $address_type;
    }

    public function create(){
        return 'create address_type';
    }

    public function store(){
        $attributes= request()->validate([
            'name'=>'required|min:3|max:10'
        ]);

        $address_type = AddressType::create($attributes);

        if($address_type==false){
            return back()->with('success','Address Type Added Successfully');
        }

        return back()->with('error','something went wrong');
    }

    public function update(AddressType $address_type){

        $attributes= request()->validate([
            'name'=>'min:3|max:10'
        ]);

        $address_type->update($attributes);

        if($address_type==false){
            return back()->with('success','Address Type Added Successfully');
        }

        return back()->with('error','something went wrong');
    }

    public function delete(AddressType $address_type){

        $address_type->delete();

        return back()->with('success','Address Type Deleted');
    }
}
 