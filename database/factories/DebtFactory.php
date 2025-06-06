<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\debt>
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
            'amount' => "₱ ".fake()->randomFloat(2, 100, 10000),
            'description' => fake()->sentence(),
            'due_date' => fake()->date(),
            'status' => fake()->randomElement(['pending', 'paid']),
            'paid_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
