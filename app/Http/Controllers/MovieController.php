<?php

namespace App\Http\Controllers;

use App\Events\CreateMovie;
use App\Http\Requests\SearchIndexRequest;
use App\Models\Movie;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MovieController extends Controller
{
    public function index(SearchIndexRequest $request){
        $query = Movie::query();
        // dump($request);
        $query->when($request->search,function($query,$search){
            
            $query->where('title', 'LIKE', "%{$search}%");
        });
        if($request->has('minYear') && $request->has('maxYear') ){
            $query->whereBetween('year', [$request->minYear, $request->maxYear]);
        }
        // $query->when($request->genre,function($query,$genres){
        //     foreach ($genres as $genre) {
        //         $query->whereHas('genres', function($query,$q) {
        //             $q->whereTitle($genre);
        //         });
        //     }
        // });

        $genres = Genre::all();
        
        // if ($request->has('search') || $request->has('minYear') || $request->has('maxYear') || $request->has('genre')) {

        //     if (is_null($request->minYear)) $request->merge([
        //         'minYear' => '0'
        //     ]);
        //     if (is_null($request->maxYear)) $request->merge([
        //         'maxYear' => '10000'
        //     ]);
            
        //     $movies = Movie::latest()->Filter($request)->paginate(8);
        //     return view('Home.index', compact('movies', 'genres'));
        // }

        $movies = $query->latest()->paginate(8);
        // $movies = Movie::all()->paginate(8);
        return view('Home.index',['movies'=>$movies,'genres'=>Genre::all()]);

    }

    public function show(Movie $movie){

        return view('movies.show',['movie'=> $movie]);
        
    }

    public function create(Movie $movie){

        return view('movies.create',['movie'=>$movie,'genres'=>Genre::all()]);
        
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
        $movie = $user->movies()->create($fields);

        // $id = $request->id;

        // $movie = Movie::all()->where('id',$id)->first();

        $genres = Genre::all();

        foreach ($request->genre as $onegenre) {
            $genre = $genres->where('title', $onegenre)->first();
            $movie->genres()->attach($genre->id);
        }

        

        return redirect(route('home'))->with('messageGreen','Movie created successfully');

        
         
    }

    public function edit(Movie $movie){

        $this->authorize('update',$movie);

        return view('movies.edit',['movie'=>$movie]);
    }

    public function update(Movie $movie){

        $this->authorize('update',$movie);

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

        $admin_users = User::all()->where('IsAdmin');

        // event(new CreateMovie($users->email));
        event(new CreateMovie(auth()->user(),$movie,$admin_users));
        
        



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
