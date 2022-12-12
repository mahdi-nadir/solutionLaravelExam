<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class Question4Test extends TestCase
{
    public function test_that_form_is_accessible()
    {
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';
        $response = $this->actingAs($user)->get('/question-4');
        $response->assertOk();
    }

    public function test_valid_form()
    {
        $this->followingRedirects();
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';
        $response = $this->actingAs($user)->from('/question-4')->post('/question-4', [
            'foo' => 0,
            'bar' => 'string',
            'baz' => '2022-12-13',
            'qux' => 'loooooooooooooooooooooooooooooooong text'
        ]);
        $response->assertSeeText('Created successfully.');
    }

    public function test_valid_form_null_bar()
    {
        $this->followingRedirects();
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';
        $response = $this->actingAs($user)->from('/question-4')->post('/question-4', [
            'foo' => 0,
            'bar' => null,
            'baz' => '2022-12-13',
            'qux' => 'loooooooooooooooooooooooooooooooong text'
        ]);
        $response->assertSeeText('Created successfully.');
    }

    public function test_invalid_foo()
    {
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';
        $response = $this->actingAs($user)->from('/question-4')->post('/question-4', [
            'foo' => -10,
            'bar' => 'string',
            'baz' => '2022-12-13',
            'qux' => 'loooooooooooooooooooooooooooooooong text'
        ]);
        $response->assertRedirect()->assertSessionHasErrors('foo');
    }

    public function test_invalid_bar()
    {
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';
        $response = $this->actingAs($user)->from('/question-4')->post('/question-4', [
            'foo' => 0,
            'bar' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
            'baz' => '2022-12-13',
            'qux' => 'loooooooooooooooooooooooooooooooong text'
        ]);
        $response->assertRedirect()->assertSessionHasErrors('bar');
    }

    public function test_invalid_baz()
    {
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';
        $response = $this->actingAs($user)->from('/question-4')->post('/question-4', [
            'foo' => 0,
            'bar' => 'string',
            'baz' => 'xxx',
            'qux' => 'loooooooooooooooooooooooooooooooong text'
        ]);
        $response->assertRedirect()->assertSessionHasErrors('baz');
    }

    public function test_invalid_baz2()
    {
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';
        $response = $this->actingAs($user)->from('/question-4')->post('/question-4', [
            'foo' => 0,
            'bar' => 'string',
            'baz' => null,
            'qux' => 'loooooooooooooooooooooooooooooooong text'
        ]);
        $response->assertRedirect()->assertSessionHasErrors('baz');
    }

    public function test_invalid_qux()
    {
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';
        $response = $this->actingAs($user)->from('/question-4')->post('/question-4', [
            'foo' => 0,
            'bar' => 'string',
            'baz' => '2022-12-13',
            'qux' => ''
        ]);
        $response->assertRedirect()->assertSessionHasErrors('qux');
    }
}
