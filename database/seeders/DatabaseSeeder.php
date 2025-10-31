<?php

namespace Database\Seeders;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

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

        for ($i = 1; $i <= 10; $i++) {
            Pet::factory()->create([
                'type' => 'dog',
                'photo' => 'dog' . $i . '.jpg',
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            Pet::factory()->create([
                'type' => 'cat',
                'photo' => 'cat' . $i . '.jpg',
            ]);
        }
    }
}
