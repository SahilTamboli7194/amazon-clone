<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return User::paginate(10);
    }

    public function show(User $user)
    {
        return User::find($user);
    }

    public function create()
    {
        return 'create ';
    }

    public function store()
    {
        $attributes = request()->validate([
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
            'date_of_birth' => 'required|date',
            'gender' => 'required|min:1|max:1',
            'mobile' => 'required|min:10|max:13|unique:users,mobile',
            'email' => 'required|email|min:5|max:50|unique:users,email',
            'password' => 'required|min:6|max:10'
        ]);

        $user = User::create($attributes);

        $role = RoleUser::create([
            'user_id' => $user->id,
            'role_id' => $attributes['role']
        ]);

        if ($role == true) {
            return back()->with('sucess', 'your account has been created successfully');
        }

        return back()->with('error', 'Some thing went wrong');
    }

    public function edit(User $user)
    {
        return 'update ' . $user->id;
    }

    public function delete()
    {
        return 'delete';
    }
}
