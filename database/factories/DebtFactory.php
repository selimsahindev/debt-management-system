<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Debt>
 */
class DebtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->words(1, true),
            'amount' => $this->faker->randomFloat(2, 1, 10000),
            'due_date' => $this->faker->dateTimeBetween('now', '+6 months'),
            'is_paid' => $this->faker->boolean,
        ];
    }
}
