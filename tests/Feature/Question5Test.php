<?php

namespace Tests\Feature;

use Tests\TestCase;
use Carbon\Carbon;

class Question5Test extends TestCase
{
    public function test_that_view_5_matin_is_returned()
    {
        Carbon::setTestNow(Carbon::create(2001, 5, 21, 0));
        $response = $this->get('/question-5');
        $response->assertOk()->assertViewIs('questions.5.matin');

        Carbon::setTestNow(Carbon::create(2001, 5, 21, 8, 30));
        $response = $this->get('/question-5');
        $response->assertOk()->assertViewIs('questions.5.matin');

        Carbon::setTestNow(Carbon::create(2001, 5, 21, 11, 59, 59));
        $response = $this->get('/question-5');
        $response->assertOk()->assertViewIs('questions.5.matin');
    }

    public function test_that_view_5_jour_is_returned()
    {
        Carbon::setTestNow(Carbon::create(2001, 5, 21, 12));
        $response = $this->get('/question-5');
        $response->assertOk()->assertViewIs('questions.5.jour');

        Carbon::setTestNow(Carbon::create(2001, 5, 21, 19, 59, 59));
        $response = $this->get('/question-5');
        $response->assertOk()->assertViewIs('questions.5.jour');
    }

    public function test_that_view_5_soir_is_returned()
    {
        Carbon::setTestNow(Carbon::create(2001, 5, 21, 20));
        $response = $this->get('/question-5');
        $response->assertOk()->assertViewIs('questions.5.soir');
    }
}
