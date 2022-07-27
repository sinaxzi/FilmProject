<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'title',
        'year',
        'runtime',
        'director',
        'actors',
        'plot',
    ];


    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function attach(Movie $movie){

        $movie->genres()->attach(request('genre'));

        return back();
    }

    public function detach(Movie $movie){

        $movie->genres()->detach(request('genre'));

        return back();
    }

    // public function scopeFilter($query, array $filters)
    // {   
    //     if ($filters['search']){
    //         $query->where('title','like','%' . request('search') . '%');
    //     }


    // }
    // public function scopeFilter($query, $request)
    // {
    //     return $query->when($request->search, function ($query) use ($request) {
    //         $query
    //             ->when($request->minYear || $request->maxYear, function ($query) use ($request) {
    //                 $query->whereBetween('year', [$request->minYear, $request->maxYear]);
    //             })
    //             ->when($request->genre, function ($query) use ($request) {
    //                 foreach ($request->genre as $genre) {
    //                     $query->whereHas('genres', function ($q) use ($request, $genre) {
    //                         $q->whereName($genre);
    //                     });
    //                 }
    //             })
    //             ->where('title', 'LIKE', "%{$request->search}%")
    //             ->orWhere('director', 'LIKE', "%{$request->search}%")
    //             ->orWhere('actors', 'LIKE', "%{$request->search}%");
    //     });
    // }
}




















        // return $query->when($request->search, function ($query) use ($request) {
        //     $query
        //         ->when($request->minYear || $request->maxYear, function ($query) use ($request) {
        //             $query->whereBetween('year', [$request->minYear, $request->maxYear]);
        //         })
        //         ->when($request->genre, function ($query) use ($request) {
        //             foreach ($request->genre as $genre) {
        //                 $query->whereHas('genres', function ($q) use ($request, $genre) {
        //                     $q->whereName($genre);
        //                 });
        //             }
        //         })
        //         ->where('title', 'LIKE', "%{$request->search}%");
                
        // })
        //     ->when($request->minYear || $request->maxYear, function ($query) use ($request) {
        //         $query->whereBetween('year', [$request->minYear, $request->maxYear]);
        //     })
        //     ->when($request->genre, function ($query) use ($request) {
        //         foreach ($request->genre as $genre) {
        //             $query->whereHas('genres', function ($q) use ($request, $genre) {
        //                 $q->whereName($genre);
        //             });
        //         }
        //     })
        //     ->get();
