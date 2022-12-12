<?php

namespace Tests\Feature;

use Tests\TestCase;
use Database\Seeders\Question2Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Question2Test extends TestCase
{
    use RefreshDatabase;

    public function test_question_2_seeder()
    {
        $this->seed(Question2Seeder::class);
        $this->assertDatabaseCount('question2s', 1000);
        $first = \App\Models\Question2::first();
        $this->assertNotNull($first);
        $this->assertNotNull($first->nom);
        $this->assertNotNull($first->chance);
        $this->assertNotNull($first->ddn);
    }
}
