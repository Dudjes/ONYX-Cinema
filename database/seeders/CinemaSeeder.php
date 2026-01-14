<?php

namespace Database\Seeders;

use App\Models\Cinema;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cinemas = [
            ['cinemaName' => 'Downtown Cinema', 'adress' => '123 Main St', 'screenSize' => 12.5, 'created_at' => now(), 'updated_at' => now()],
            ['cinemaName' => 'Riverside Cinema', 'adress' => '45 River Rd', 'screenSize' => 9.8, 'created_at' => now(), 'updated_at' => now()],
        ];

        Cinema::insert($cinemas);
    }
}
