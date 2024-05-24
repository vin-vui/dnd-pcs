<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Character;
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
            'name' => 'Sheena',
            'email' => 'test@test.com',
        ]);

        Character::factory(10)->create();
    }
}
