<?php

namespace App\Console\Commands;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;


class Insert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Insert:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Inserting json file into data base';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $file = file_get_contents(storage_path('app/private/database/db.json' ));
        $records = json_decode($file,true);

        foreach ($records['genres'] as $record) {
            Genre::create([
                'title' => $record
            ]);
        }

        $genres = Genre::all();
        $movies = Movie::all();
        $users = User::all();
        foreach ($records['movies'] as $record) {

            $user = $users->where('id',rand(1,10))->first();

            $movie = $user->movies()->create([
                'title' => $record["title"],
                'actors' => $record["actors"],
                'plot' => $record["plot"],
                'runtime' => $record["runtime"],
                'posterUrl' => $record["posterUrl"],
                'year' => $record["year"],
                'director' => $record["director"],
            ]);

            foreach ($record["genres"] as $genre) {
                $genre = $genres->where('title', $genre)->first();
                $movie->genres()->attach($genre->id);
            }
        }
    }
}
