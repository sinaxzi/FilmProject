<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function attach(Role $role){

        $role->permissions()->attach(request('permission'));

        return back();
    }

    public function detach(Role $role){

        $role->permissions()->detach(request('permission'));

        return back();

    }
}
