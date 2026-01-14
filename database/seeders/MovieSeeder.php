<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'movieName' => 'The Midnight Heist',
                'ageRequirement' => 'PG-13',
                'duration' => '02:15:00',
                'description' => 'cool movie',
                'genreId' => 1, // Action
            ],
            [
                'movieName' => 'Eternal Echoes',
                'ageRequirement' => 'R',
                'duration' => '01:58:00',
                'description' => 'cool movie',
                'genreId' => 2, // Drama
            ],
            [
                'movieName' => 'Beyond the Stars',
                'ageRequirement' => 'PG-13',
                'duration' => '02:30:00',
                'description' => 'cool movie',
                'genreId' => 3, // Sci-Fi
            ],
            [
                'movieName' => 'Laugh Out Loud',
                'ageRequirement' => 'PG',
                'duration' => '01:45:00',
                'description' => 'cool movie',
                'genreId' => 4, // Comedy
            ],
            [
                'movieName' => 'Shadow of Fear',
                'ageRequirement' => 'R',
                'duration' => '01:52:00',
                'description' => 'cool movie',
                'genreId' => 5, // Horror
            ],
            [
                'movieName' => 'Love in Paris',
                'ageRequirement' => 'PG-13',
                'duration' => '02:05:00',
                'description' => 'cool movie',
                'genreId' => 6, // Romance
            ],
            [
                'movieName' => 'The Last Guardian',
                'ageRequirement' => 'PG-13',
                'duration' => '02:35:00',
                'description' => 'cool movie',
                'genreId' => 1, // Action
            ],
            [
                'movieName' => 'Cosmic Voyage',
                'ageRequirement' => 'PG',
                'duration' => '02:20:00',
                'description' => 'cool movie',
                'genreId' => 3, // Sci-Fi
            ],
            [
                'movieName' => 'The Silent Witness',
                'ageRequirement' => 'R',
                'duration' => '02:10:00',
                'description' => 'cool movie',
                'genreId' => 7, // Thriller
            ],
            [
                'movieName' => 'Dance of Dreams',
                'ageRequirement' => 'PG',
                'duration' => '01:55:00',
                'description' => 'cool movie',
                'genreId' => 2, // Drama
            ],
            [
                'movieName' => 'Zombie Apocalypse',
                'ageRequirement' => 'R',
                'duration' => '02:00:00',
                'description' => 'cool movie',
                'genreId' => 5, // Horror
            ],
            [
                'movieName' => 'The Comedy Show',
                'ageRequirement' => 'PG-13',
                'duration' => '01:40:00',
                'description' => 'cool movie',
                'genreId' => 4, // Comedy
            ],
            [
                'movieName' => 'Velocity Chase',
                'ageRequirement' => 'PG-13',
                'duration' => '02:18:00',
                'description' => 'cool movie',
                'genreId' => 1, // Action
            ],
            [
                'movieName' => 'Hearts Entwined',
                'ageRequirement' => 'PG-13',
                'duration' => '01:50:00',
                'description' => 'cool movie',
                'genreId' => 6, // Romance
            ],
            [
                'movieName' => 'Time Paradox',
                'ageRequirement' => 'PG-13',
                'duration' => '02:25:00',
                'description' => 'cool movie',
                'genreId' => 3, // Sci-Fi
            ],
            [
                'movieName' => 'The Broken Promise',
                'ageRequirement' => 'R',
                'duration' => '02:12:00',
                'description' => 'cool movie',
                'genreId' => 2, // Drama
            ],
            [
                'movieName' => 'Nightmare Manor',
                'ageRequirement' => 'R',
                'duration' => '01:48:00',
                'description' => 'cool movie',
                'genreId' => 5, // Horror
            ],
            [
                'movieName' => 'Spy Protocol',
                'ageRequirement' => 'PG-13',
                'duration' => '02:08:00',
                'description' => 'cool movie',
                'genreId' => 7, // Thriller
            ],
            [
                'movieName' => 'Summer of Laughter',
                'ageRequirement' => 'PG',
                'duration' => '01:38:00',
                'description' => 'cool movie',
                'genreId' => 4, // Comedy
            ],
            [
                'movieName' => 'Dragon Warriors',
                'ageRequirement' => 'PG-13',
                'duration' => '02:40:00',
                'description' => 'cool movie',
                'genreId' => 8, // Fantasy
            ],
        ];
        Movie::insert($movies);
    }
}
