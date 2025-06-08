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
        $isPaid = fake()->boolean();

        return [
            'amount' => fake()->randomFloat(2, 1000, 10000),
            'description' => fake()->word(),
            'due_date' => fake()->dateTimeBetween('now', '+1 year'),
            'created_at' => now(),
            'updated_at' => now(),
            'status' => $isPaid ? 'paid' : 'pending',
        ];
    }
}
