<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MovieController extends Controller
{
    public function index(){

        $movies = Movie::latest()->paginate(8);

        return view('Home.index',['movies'=>$movies]);

    }

    public function show(Movie $movie){

        return view('movies.show',['movie'=> $movie]);
        
    }

    public function create(){

        return view('movies.create');
        
    }

    public function store(Request $request){

        $fields = $request->validate([
            'title' => 'required|min:6',
            'year' => 'required|digits:4',
            'runtime' => 'required|integer',
            'director' => 'required|min:6',
            'actors' => 'required|min:6',
            'plot' => 'required|min:6',
        ]);

        if($request->hasFile('posterUrl')){
            $fields['posterUrl'] = $request->file('posterUrl')->store('storage');
        }

        $user = $request->user();

        $user->movies()->create($fields);



        return redirect(route('home'))->with('messageGreen','Movie created successfully');

        
         
    }

    public function edit(Movie $movie){

        return view('movies.edit',['movie'=>$movie]);
    }

    public function update(Movie $movie){


        $fields = request()->validate([
            'title' => 'required|min:6',
            'year' => 'required|digits:4',
            'runtime' => 'required|integer',
            'director' => 'required|min:6',
            'actors' => 'required|min:6',
            'plot' => 'required|min:6',
        ]);

        if(request()->hasFile('posterUrl')){
            $fields['posterUrl'] = request()->file('posterUrl')->store('posterUrls','public');
        }

        $movie->update($fields);


        return back()->with('messageGreen','Movie updated successfully');

    }

    public function destroy(Movie $movie){
        

        $movie->delete();

        return redirect(route('movie.manage',auth()->user()))->with('messageRed','Movie deleted successfully');

    }

    public function manage(User $user){


        $movies = $user->movies()->with(['user'])->paginate(20);

        return view('movies.manage',['movies' => $movies]);

    }

    // public function scopeFilter($query , array $filters){
        
    //     if ($filters['search'] ?? false){
    //         $query->where('title','like','%' . request('search') . '%')
    //               ->orWhere($movie->genre,'like','%' . request('search') . '%');
    //     }
    // }
}
