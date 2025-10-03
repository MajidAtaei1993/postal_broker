<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Package;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 user
        User::factory(10)->create();

        // Create 10 packages (independently)
        Package::factory(10)->create();
    }
}
