<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Question6Test extends TestCase
{
    use RefreshDatabase;

    public function test_that_page_show_non_without_login()
    {
        $response = $this->get('/question-6');
        $response->assertOk()->assertSeeText('Authentifié: Non');
    }

    public function test_that_page_show_oui_with_login()
    {
        $user = User::factory()->create();
        $user->email = 'question-6@cmaisonneuve.qc.ca';

        $response = $this->actingAs($user)->get('/question-6');
        $response->assertOk()->assertSeeText('Authentifié: Oui');
    }
}
