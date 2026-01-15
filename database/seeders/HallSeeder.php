<?php

namespace Database\Seeders;

use App\Models\Hall;
use App\Models\Cinema;
use Illuminate\Database\Seeder;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cinemas = Cinema::all();
        $halls = [];

        foreach ($cinemas as $cinema) {
            // create 3 halls per cinema with different capacities
            $halls[] = ['hallNumber' => 1, 'capacity' => 60, 'cinemaId' => $cinema->cinemaId, 'created_at' => now(), 'updated_at' => now()];
            $halls[] = ['hallNumber' => 2, 'capacity' => 80, 'cinemaId' => $cinema->cinemaId, 'created_at' => now(), 'updated_at' => now()];
            $halls[] = ['hallNumber' => 3, 'capacity' => 50, 'cinemaId' => $cinema->cinemaId, 'created_at' => now(), 'updated_at' => now()];
        }

        Hall::insert($halls);
    }
}
