<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Movie;

class Movie_GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // The migration created a table named `_movie__genre`.
        $inserts = [];
        $movies = Movie::all();

        foreach ($movies as $movie) {
            $inserts[] = [
                'genreId' => $movie->genreId,
                'movieId' => $movie->movieId,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        if (!empty($inserts)) {
            DB::table('_movie__genre')->insert($inserts);
        }
    }
}
