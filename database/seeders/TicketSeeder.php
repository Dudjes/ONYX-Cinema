<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\Play;
use App\Models\User;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plays = Play::all();
        $users = User::all();

        if ($plays->isEmpty() || $users->isEmpty()) {
            $this->command->warn('No plays or users found. Skipping ticket seeding.');
            return;
        }

        $tickets = [];

        foreach ($plays as $play) {
            // Get hall capacity
            $capacity = $play->hall->capacity ?? 64; 
            $seatsToCreate = min(rand(3, 8), $capacity); // Random 3-8 seats per play

            // Get random seat numbers without duplicates for this play
            $availableSeats = range(1, $capacity);
            shuffle($availableSeats);
            $selectedSeats = array_slice($availableSeats, 0, $seatsToCreate);

            foreach ($selectedSeats as $seatNumber) {
                $user = $users->random();

                $tickets[] = [
                    'seat' => $seatNumber,
                    'playId' => $play->playId,
                    'userId' => $user->id,
                    'isSold' => 1, // Mark as sold 
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        if (!empty($tickets)) {
            Ticket::insert($tickets);
            $this->command->info('Created ' . count($tickets) . ' tickets.');
        }
    }
}