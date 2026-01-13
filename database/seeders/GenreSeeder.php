<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            ['genreName' => 'Action'],
            ['genreName' => 'Drama'],
            ['genreName' => 'Sci-Fi'],
            ['genreName' => 'Comedy'],
            ['genreName' => 'Horror'],
            ['genreName' => 'Romance'],
            ['genreName' => 'Thriller'],
            ['genreName' => 'Fantasy'],
            ['genreName' => 'Adventure'],
            ['genreName' => 'Mystery'],
        ];
        Genre::insert($genres);
    }
}
