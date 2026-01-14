<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\play as PlayModel;
use App\Models\Movie;
use App\Models\Hall;
use App\Models\Cinema;
use Carbon\Carbon;

class PlaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = Movie::all();
        $halls = Hall::all();
        $cinemas = Cinema::all();

        $plays = [];
        $now = Carbon::now();
        $offset = 1;

        foreach ($movies->take(15) as $movie) {
            // pick a hall and cinema that exist
            $hall = $halls->random();
            $cinema = $cinemas->where('cinemaId', $hall->cinemaId)->first() ?? $cinemas->first();

            $when = $now->copy()->addDays($offset)->setTime(19, 0, 0);

            $plays[] = [
                'when' => $when->toDateTimeString(),
                'movieId' => $movie->movieId,
                'hallId' => $hall->hallId,
                'cinemaId' => $cinema->cinemaId,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // also add a matinee
            $plays[] = [
                'when' => $when->copy()->setTime(14, 30, 0)->toDateTimeString(),
                'movieId' => $movie->movieId,
                'hallId' => $hall->hallId,
                'cinemaId' => $cinema->cinemaId,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $offset++;
        }

        if (!empty($plays)) {
            PlayModel::insert($plays);
        }
    }
}
