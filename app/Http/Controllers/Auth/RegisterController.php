<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){

        return view('auth.register');
   }

   public function store(Request $request){
    // dd($request->all());
       $fields = $request->validate([
           'name' => 'required|min:4',
           'email' => ['required',Rule::unique('users','email'),'email'],
           'password' => 'required|confirmed'
       ]);

       

       $fields['password'] = Hash::make($fields['password']);
       $fields['IsAdmin'] = $request->filled('IsAdmin') ? 1 : 0;

       $user = User::create($fields);

       auth()->login($user);

       return redirect(route('home'))->with('messageGreen','user created and logged in');
       
   }
}
