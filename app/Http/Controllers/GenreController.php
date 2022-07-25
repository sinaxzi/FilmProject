<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function create(){

        return view('genres.create');
        
    }

    public function store(Request $request){

        $fields = $request->validate([
            'title' => 'required|min:3',
        ]);

        Genre::create($fields);


        return redirect(route('home'))->with('messageGreen','Genre created successfully');

        
         
    }
}
