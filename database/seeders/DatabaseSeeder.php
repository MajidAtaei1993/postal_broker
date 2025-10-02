<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Sender;
use App\Models\Receiver;
use App\Models\Package;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // default password
        ]);

        // Create 5 senders
        Sender::factory(5)->create();

        // Create 5 receivers
        Receiver::factory(5)->create();

        // Create 10 packages (independently)
        Package::factory(10)->create();
    }
}
