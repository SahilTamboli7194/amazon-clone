<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        return Role::paginate(10);
    }

    public function show(Role $role){
        return $role;
    }

    public function store(){
        $attributes= request()->validate([
            'name'=>'required|min:3|max:10'
        ]);

        $role = Role::create($attributes);

        if($role==false){
            return back()->with('success','Role Added Successfully');
        }

        return back()->with('error','something went wrong');
    }

    public function update(Role $role){

        $attributes= request()->validate([
            'name'=>'min:3|max:10'
        ]);

        $role->update($attributes);

        if($role==false){
            return back()->with('success','Role Added Successfully');
        }

        return back()->with('error','something went wrong');
    }

    public function delete(Role $role){

        $role->delete();

        return back()->with('success','Role Deleted');
    }
}
