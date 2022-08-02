<?php

namespace App\Http\Controllers;

use App\Events\CreateMovie;
use App\Http\Requests\SearchIndexRequest;
use App\Http\Requests\CreateMovieValidattionRequest;
use App\Models\Movie;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\URL;

class MovieController extends Controller
{
    public function index(SearchIndexRequest $request){
        $request->validated();
        $query = Movie::query();

        $query->when($request->search,function($query,$search){
            
            $query->where('title', 'LIKE', "%".$search."%");
        });

        if(is_null($request->minYear) && is_null($request->maxYear)){
            $request->minYear = 0;

            $request->maxYear = 10000;
        }
        $query->whereBetween('year', [$request->minYear, $request->maxYear]);


        $query->when($request->genre,function($query,$genres){
            foreach ($genres as $genre) {
                $query->whereHas('genres', function($query) use($genre) {
                    $query->whereTitle($genre);
                });
            }
        });
        $movies = $query->latest()->paginate(8)->appends($request->query());
        return view('Home.index',['movies'=>$movies,'genres'=>Genre::all()]);

    }

    public function show(Movie $movie){

        return view('movies.show',['movie'=> $movie,'genres'=>Genre::all()]);
        
    }

    public function create(){
        return view('movies.create',['genres'=>Genre::all()]);
        
    }

    public function store(CreateMovieValidattionRequest $request){
        
        $fields = $request->validated();

        if($request->hasFile('posterUrl')){
            $file = $request->file('posterUrl');
            $name = 'public/' . $file->hashName();
            Storage::disk('local')->put($name,file_get_contents($file));
            $fields['posterUrl'] = Storage::disk('local')->url($name);
        }

        
        $user = $request->user();
        $movie = $user->movies()->create($fields);

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

    public function update(CreateMovieValidattionRequest $request,Movie $movie){

        // $this->authorize('update',$movie);

        $fields = $request->validated();

        if($request->hasFile('posterUrl')){
            $file = $request->file('posterUrl');
            $name = 'public/' . $file->hashName();
            Storage::disk('local')->put($name,file_get_contents($file));
            $fields['posterUrl'] = Storage::disk('local')->url($name);
        }


        $movie->update($fields);

        $admin_users = User::all()->where('IsAdmin');

        event(new CreateMovie(auth()->user(),$movie,$admin_users));
        
        



        return back()->with('messageGreen','Movie updated successfully');

    }

    public function destroy(Movie $movie){
        

        $movie->delete();


        return back()->with('messageRed','Movie deleted successfully');

    }

    public function manage(User $user){


        $movies = $user->movies()->with(['user'])->paginate(20);

        return view('movies.manage',['movies' => $movies]);

    }
}
