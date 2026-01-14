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
                'price' => 9.99,
                'genreId' => 1, // Action
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'Eternal Echoes',
                'ageRequirement' => 'R',
                'duration' => '01:58:00',
                'description' => 'cool movie',
                'price' => 11.5,
                'genreId' => 2, // Drama
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'Beyond the Stars',
                'ageRequirement' => 'PG-13',
                'duration' => '02:30:00',
                'description' => 'cool movie',
                'price' => 12.0,
                'genreId' => 3, // Sci-Fi
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'Laugh Out Loud',
                'ageRequirement' => 'PG',
                'duration' => '01:45:00',
                'description' => 'cool movie',
                'price' => 8.5,
                'genreId' => 4, // Comedy
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'Shadow of Fear',
                'ageRequirement' => 'R',
                'duration' => '01:52:00',
                'description' => 'cool movie',
                'price' => 10.0,
                'genreId' => 5, // Horror
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'Love in Paris',
                'ageRequirement' => 'PG-13',
                'duration' => '02:05:00',
                'description' => 'cool movie',
                'price' => 9.5,
                'genreId' => 6, // Romance
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'The Last Guardian',
                'ageRequirement' => 'PG-13',
                'duration' => '02:35:00',
                'description' => 'cool movie',
                'price' => 11.5,
                'genreId' => 1, // Action
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'Cosmic Voyage',
                'ageRequirement' => 'PG',
                'duration' => '02:20:00',
                'description' => 'cool movie',
                'price' => 11.0,
                'genreId' => 3, // Sci-Fi
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'The Silent Witness',
                'ageRequirement' => 'R',
                'duration' => '02:10:00',
                'description' => 'cool movie',
                'price' => 10.5,
                'genreId' => 7, // Thriller
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'Dance of Dreams',
                'ageRequirement' => 'PG',
                'duration' => '01:55:00',
                'description' => 'cool movie',
                'price' => 9.0,
                'genreId' => 2, // Drama
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'Zombie Apocalypse',
                'ageRequirement' => 'R',
                'duration' => '02:00:00',
                'description' => 'cool movie',
                'price' => 10.0,
                'genreId' => 5, // Horror
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'The Comedy Show',
                'ageRequirement' => 'PG-13',
                'duration' => '01:40:00',
                'description' => 'cool movie',
                'price' => 8.0,
                'genreId' => 4, // Comedy
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'Velocity Chase',
                'ageRequirement' => 'PG-13',
                'duration' => '02:18:00',
                'description' => 'cool movie',
                'price' => 11.0,
                'genreId' => 1, // Action
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'Hearts Entwined',
                'ageRequirement' => 'PG-13',
                'duration' => '01:50:00',
                'description' => 'cool movie',
                'price' => 9.5,
                'genreId' => 6, // Romance
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'Time Paradox',
                'ageRequirement' => 'PG-13',
                'duration' => '02:25:00',
                'description' => 'cool movie',
                'price' => 12.5,
                'genreId' => 3, // Sci-Fi
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'The Broken Promise',
                'ageRequirement' => 'R',
                'duration' => '02:12:00',
                'description' => 'cool movie',
                'price' => 11.0,
                'genreId' => 2, // Drama
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'Nightmare Manor',
                'ageRequirement' => 'R',
                'duration' => '01:48:00',
                'description' => 'cool movie',
                'price' => 10.0,
                'genreId' => 5, // Horror
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'Spy Protocol',
                'ageRequirement' => 'PG-13',
                'duration' => '02:08:00',
                'description' => 'cool movie',
                'price' => 11.0,
                'genreId' => 7, // Thriller
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'Summer of Laughter',
                'ageRequirement' => 'PG',
                'duration' => '01:38:00',
                'description' => 'cool movie',
                'price' => 8.0,
                'genreId' => 4, // Comedy
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'movieName' => 'Dragon Warriors',
                'ageRequirement' => 'PG-13',
                'duration' => '02:40:00',
                'description' => 'cool movie',
                'price' => 13.0,
                'genreId' => 8, // Fantasy
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Movie::insert($movies);
    }
}
