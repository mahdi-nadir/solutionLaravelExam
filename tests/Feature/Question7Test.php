<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Question7Test extends TestCase
{
    use RefreshDatabase;

    public function test_localized_in_english()
    {
        $response = $this->get('/en/question-7');
        $response->assertOk()
            ->assertSeeText('Question 7')
            ->assertSeeText('Question number seven');
    }

    public function test_localized_in_french()
    {
        $response = $this->get('/fr/question-7');
        $response->assertOk()
            ->assertSeeText('Question 7')
            ->assertSeeText('Question numéro sept');
    }

    public function test_link_in_nav_on_dashboard()
    {
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';
        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertOk()->assertSee('/en/question-7');
    }
}
