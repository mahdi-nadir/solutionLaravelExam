<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question2>
 */
class Question2Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'chance' => $this->faker->boolean,
            'ddn' => $this->faker->dateTimeBetween('-70 years', '-18 years'), // reference: https://learninglaravel.net/a-laravel-factory-with-starting-and-ending-dates
        ];
    }
}
