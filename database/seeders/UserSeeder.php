<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Test User 1',
            'email' => 'test@test.com',
        ]);

        User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test@cmaisonneuve.qc.ca',
        ]);

        User::factory()->create([
            'name' => 'Test User 3',
            'email' => 'e-test@cmaisonneuve.qc.ca',
        ]);
    }
}
