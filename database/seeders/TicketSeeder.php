<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use App\Models\play as PlayModel;
use App\Models\User;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plays = PlayModel::all();
        $users = User::all();

        $tickets = [];

        foreach ($plays as $play) {
            // create a few sample seats for each play
            for ($i = 1; $i <= 8; $i++) {
                $seat = 'A' . $i;
                $user = $users->random();

                $tickets[] = [
                    'seat' => $seat,
                    'playId' => $play->playId,
                    'userId' => $user->id,
                    'isSold' => (bool) rand(0, 1),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        if (!empty($tickets)) {
            Ticket::insert($tickets);
        }
    }
}
