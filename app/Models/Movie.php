<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable=[
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
}
