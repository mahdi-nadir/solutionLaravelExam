<?php

namespace Database\Seeders;

use App\Models\Question2;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Question2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Question2::factory(1000)->create();
        Question2::factory()->count(1000)->create();
    }
}
