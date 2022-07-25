<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){

        return view('auth.login');
    }

    public function store(Request $request){

        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($fields)){

            $request->session()->regenerate();

            return redirect()->route('home')->with('messageGreen','You are now logged in!');

            
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');

    }
}
