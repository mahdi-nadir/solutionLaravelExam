<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Database\Seeders\Question3Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Question3Test extends TestCase
{
    use RefreshDatabase;

    public function test_that_question_3_returns_data()
    {
        $this->seed(Question3Seeder::class);
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';

        $response = $this->actingAs($user)->get('/question-3');
        $response->assertOk()->assertSeeText('foo')->assertSeeText('bar')->assertSeeText('baz');
    }

    public function test_that_question_3_returns_data_sorted_and_limited()
    {
        $this->seed(Question3Seeder::class);
        $user = User::factory()->create();
        $user->email = 'test@cmaisonneuve.qc.ca';

        $responseUnsorted = $this->actingAs($user)->get('/question-3');
        $responseUnsorted->assertOk()->assertSeeText('foo')->assertSeeText('bar')->assertSeeText('baz');

        $responseSortedByFoo = $this->actingAs($user)->get('/question-3?col=foo&dir=asc');
        $responseSortedByFoo->assertOk()->assertSeeText('foo')->assertSeeText('bar')->assertSeeText('baz');

        $responseSortedByFooDesc = $this->actingAs($user)->get('/question-3?col=foo&dir=desc');
        $responseSortedByFooDesc->assertOk()->assertSeeText('foo')->assertSeeText('bar')->assertSeeText('baz');

        $responseSortedByBaz = $this->actingAs($user)->get('/question-3?col=baz&dir=desc');
        $responseSortedByBaz->assertOk()->assertSeeText('foo')->assertSeeText('bar')->assertSeeText('baz');

        $responseLimited = $this->actingAs($user)->get('/question-3?lim=10');
        $responseLimited->assertOk()->assertSeeText('foo')->assertSeeText('bar')->assertSeeText('baz');

        $responseSortedByFooLimited = $this->actingAs($user)->get('/question-3?col=foo&dir=asc&lim=5');
        $responseSortedByFooLimited->assertOk()->assertSeeText('foo')->assertSeeText('bar')->assertSeeText('baz');

        $this->assertNotEquals(
            $this->extractTableFromResponse($responseUnsorted),
            $this->extractTableFromResponse($responseSortedByFoo)
        );
        $this->assertNotEquals(
            $this->extractTableFromResponse($responseUnsorted),
            $this->extractTableFromResponse($responseSortedByBaz)
        );
        $this->assertNotEquals(
            $this->extractTableFromResponse($responseUnsorted),
            $this->extractTableFromResponse($responseLimited)
        );
        $this->assertNotEquals(
            $this->extractTableFromResponse($responseSortedByFoo),
            $this->extractTableFromResponse($responseSortedByBaz)
        );
        $this->assertNotEquals(
            $this->extractTableFromResponse($responseSortedByFoo),
            $this->extractTableFromResponse($responseLimited)
        );
        $this->assertNotEquals(
            $this->extractTableFromResponse($responseSortedByFoo),
            $this->extractTableFromResponse($responseSortedByFooDesc)
        );
        $this->assertNotEquals(
            $this->extractTableFromResponse($responseSortedByFoo),
            $this->extractTableFromResponse($responseSortedByFooLimited)
        );
        $this->assertNotEquals(
            $this->extractTableFromResponse($responseSortedByBaz),
            $this->extractTableFromResponse($responseLimited)
        );
    }

    private function extractTableFromResponse($response)
    {
        return preg_replace('/[\s\S]*(<table([^>]*)>([\s\S]+)<\/table>)[\s\S]*/s', '$1', $response->getContent());
    }
}
