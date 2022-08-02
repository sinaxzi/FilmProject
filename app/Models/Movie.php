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
        'posterUrl',
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


}


