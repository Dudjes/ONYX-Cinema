<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;

class MovieGenreSeeder extends Seeder
{
    public function run(): void
    {
        $genreIds = Genre::pluck('genreId')->toArray();

        Movie::all()->each(function ($movie) use ($genreIds) { //for every movie
            $movie->genres()->attach(
                collect($genreIds)->random(rand(1, 3)) //give 1 to 3 genres
            );
        });
    }
}
