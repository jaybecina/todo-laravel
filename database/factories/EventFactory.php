<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->words(2, true),
            'start_date' => fake()->dateTimeBetween('-1 year', '+1 year'),
            'end_date' => fake()->dateTimeBetween('-1 year', '+1 year'),
        ];
    }
}
