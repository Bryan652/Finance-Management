<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\expense>
 */
class expenseFactory extends Factory
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
            'date' => fake()->date(),
            'updated_at' => now(),
            'created_at' => now(),
        ];
    }
}
