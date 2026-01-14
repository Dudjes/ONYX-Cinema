<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $movies = [
            [
                'movieName' => 'Inception',
                'ageRequirement' => 'PG-13',
                'duration' => '02:28:00',
                'description' => 'A thief steals secrets through dream-sharing technology.',
                'price' => 12.0,
                'genreId' => 3,
                'image' => 'https://upload.wikimedia.org/wikipedia/en/2/20/Inception_%282010%29_theatrical_poster.jpg',
            ],
            [
                'movieName' => 'The Dark Knight',
                'ageRequirement' => 'PG-13',
                'duration' => '02:32:00',
                'description' => 'Batman faces the Joker in Gotham City.',
                'price' => 12.5,
                'genreId' => 1,
                'image' => 'https://upload.wikimedia.org/wikipedia/en/8/8a/Dark_Knight.jpg',
            ],
            [
                'movieName' => 'Interstellar',
                'ageRequirement' => 'PG-13',
                'duration' => '02:49:00',
                'description' => 'Explorers travel through a wormhole to save humanity.',
                'price' => 13.0,
                'genreId' => 3,
                'image' => 'https://upload.wikimedia.org/wikipedia/en/b/bc/Interstellar_film_poster.jpg',
            ],
            [
                'movieName' => 'Forrest Gump',
                'ageRequirement' => 'PG-13',
                'duration' => '02:22:00',
                'description' => 'The extraordinary life of Forrest Gump.',
                'price' => 10.0,
                'genreId' => 2,
                'image' => 'https://upload.wikimedia.org/wikipedia/en/6/67/Forrest_Gump_poster.jpg',
            ],
            [
                'movieName' => 'Titanic',
                'ageRequirement' => 'PG-13',
                'duration' => '03:14:00',
                'description' => 'A romance aboard the ill-fated Titanic.',
                'price' => 11.5,
                'genreId' => 6,
                'image' => 'https://upload.wikimedia.org/wikipedia/commons/2/22/Titanic_poster.jpg',
            ],
            [
                'movieName' => 'The Hangover',
                'ageRequirement' => 'R',
                'duration' => '01:40:00',
                'description' => 'A bachelor party gone terribly wrong.',
                'price' => 9.0,
                'genreId' => 4,
                'image' => 'https://upload.wikimedia.org/wikipedia/en/b/b9/Hangoverposter09.jpg',
            ],
            [
                'movieName' => 'The Conjuring',
                'ageRequirement' => 'R',
                'duration' => '01:52:00',
                'description' => 'Paranormal investigators help a haunted family.',
                'price' => 10.0,
                'genreId' => 5,
                'image' => 'https://upload.wikimedia.org/wikipedia/en/1/1f/The_Conjuring_poster.jpg',
            ],
            [
                'movieName' => 'Gladiator',
                'ageRequirement' => 'R',
                'duration' => '02:35:00',
                'description' => 'A Roman general seeks revenge.',
                'price' => 11.0,
                'genreId' => 1,
                'image' => 'https://upload.wikimedia.org/wikipedia/en/8/8d/Gladiator_ver1.jpg',
            ],
            [
                'movieName' => 'Avengers: Endgame',
                'ageRequirement' => 'PG-13',
                'duration' => '03:02:00',
                'description' => 'The Avengers assemble for one final battle.',
                'price' => 14.0,
                'genreId' => 1,
                'image' => 'https://upload.wikimedia.org/wikipedia/en/0/0d/Avengers_Endgame_poster.jpg',
            ],
            [
                'movieName' => 'Joker',
                'ageRequirement' => 'R',
                'duration' => '02:02:00',
                'description' => 'The origin story of Gotham’s most infamous villain.',
                'price' => 11.0,
                'genreId' => 7,
                'image' => 'https://upload.wikimedia.org/wikipedia/en/e/e1/Joker_%282019_film%29_poster.jpg',
            ],
            [
                'movieName' => 'The Matrix',
                'ageRequirement' => 'R',
                'duration' => '02:16:00',
                'description' => 'A hacker discovers the truth about reality.',
                'price' => 11.5,
                'genreId' => 3,
                'image' => 'https://upload.wikimedia.org/wikipedia/en/c/c1/The_Matrix_Poster.jpg',
            ],
            [
                'movieName' => 'Jurassic Park',
                'ageRequirement' => 'PG-13',
                'duration' => '02:07:00',
                'description' => 'Dinosaurs are brought back to life.',
                'price' => 10.5,
                'genreId' => 8,
                'image' => 'https://upload.wikimedia.org/wikipedia/en/e/e7/Jurassic_Park_poster.jpg',
            ],
            [
                'movieName' => 'The Shawshank Redemption',
                'ageRequirement' => 'R',
                'duration' => '02:22:00',
                'description' => 'Hope and friendship inside a prison.',
                'price' => 10.0,
                'genreId' => 2,
                'image' => 'https://upload.wikimedia.org/wikipedia/en/8/81/ShawshankRedemptionMoviePoster.jpg',
            ],
            [
                'movieName' => 'Pulp Fiction',
                'ageRequirement' => 'R',
                'duration' => '02:34:00',
                'description' => 'Interwoven stories of crime in Los Angeles.',
                'price' => 11.0,
                'genreId' => 7,
                'image' => 'https://upload.wikimedia.org/wikipedia/en/8/82/Pulp_Fiction_cover.jpg',
            ],
            [
                'movieName' => 'Toy Story',
                'ageRequirement' => 'G',
                'duration' => '01:21:00',
                'description' => 'Toys come to life when humans are not around.',
                'price' => 8.0,
                'genreId' => 4,
                'image' => 'https://upload.wikimedia.org/wikipedia/en/1/13/Toy_Story.jpg',
            ],
            [
                'movieName' => 'Finding Nemo',
                'ageRequirement' => 'G',
                'duration' => '01:40:00',
                'description' => 'A father searches the ocean for his son.',
                'price' => 8.5,
                'genreId' => 4,
                'image' => 'https://upload.wikimedia.org/wikipedia/en/2/29/Finding_Nemo.jpg',
            ],
        ];

        foreach ($movies as $movie) {
            Movie::create(array_merge($movie, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
