<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Question1Test extends TestCase
{
    use RefreshDatabase;

    public function test_that_page_is_not_accessible_without_login()
    {
        $response = $this->get('/question-1');
        $response->assertRedirect('/login');
    }

    public function test_that_page_is_accessible_for_super_admin()
    {
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';

        $response = $this->actingAs($user)->get('/question-1');
        $response->assertOk();
    }

    public function test_that_page_is_not_accessible_for_non_admin()
    {
        $user = User::factory()->create();
        $user->email = 'test@test.qc.ca';

        $response = $this->actingAs($user)->get('/question-1');
        $response->assertForbidden();
    }

    public function test_that_page_is_not_accessible_for_non_admin_cmaisonneuve()
    {
        $user = User::factory()->create();
        $user->email = 'e-test@cmaisonneuve.qc.ca';

        $response = $this->actingAs($user)->get('/question-1');
        $response->assertForbidden();
    }

    public function test_that_link_is_accessible_for_admin()
    {
        $user = User::factory()->create();
        $user->email = 'admin@cmaisonneuve.qc.ca';

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertOk()->assertSeeText('Question 1');
    }

    public function test_that_link_is_not_accessible_for_non_admin()
    {
        $user = User::factory()->create();
        $user->email = 'test@test.qc.ca';

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertOk()->assertDontSeeText('Question 1');
    }

    public function test_that_link_is_not_accessible_for_non_admin_cmaisonneuve()
    {
        $user = User::factory()->create();
        $user->email = 'e-test@cmaisonneuve.qc.ca';

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertOk()->assertDontSeeText('Question 1');
    }
}
