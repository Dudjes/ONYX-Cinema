<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            ['firstname' => 'John', 'lastname' => 'Doe', 'email' => 'john@example.com', 'password' => bcrypt('password'), 'created_at' => now(), 'updated_at' => now()],
            ['firstname' => 'Jane', 'lastname' => 'Smith', 'email' => 'jane@example.com', 'password' => bcrypt('password'), 'created_at' => now(), 'updated_at' => now()],
            ['firstname' => 'Alice', 'lastname' => 'Brown', 'email' => 'alice@example.com', 'password' => bcrypt('password'), 'created_at' => now(), 'updated_at' => now()],
            ['firstname' => 'Bob', 'lastname' => 'Johnson', 'email' => 'bob@example.com', 'password' => bcrypt('password'), 'created_at' => now(), 'updated_at' => now()],
            ['firstname' => 'Eve', 'lastname' => 'Davis', 'email' => 'eve@example.com', 'password' => bcrypt('password'), 'created_at' => now(), 'updated_at' => now()],
        ];

        Account::insert($accounts);
    }
}
