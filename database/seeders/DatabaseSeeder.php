<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\events;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        events::create([
            'name' => 'Laravel Event',
            'description' => 'This is a Laravel event',
            'location' => 'Laravel Avenue',
            'date' => '2021-10-10',
        ]);
    }
}
