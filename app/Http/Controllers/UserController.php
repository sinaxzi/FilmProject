<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function attach(User $user){

        $user->roles()->attach(request('role'));

        return back();
    }

    public function detach(User $user){

        $user->roles()->detach(request('role'));

        return back();
    }
}
