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
            'client_name' => $this->faker->name(),
            'client_information' => $this->faker->address(),
            'client_phone' => $this->faker->phoneNumber(),
            'date' => $this->faker->date(),
            'amount' => $this->faker->numberBetween(1000, 999999),
            'image' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['pending', 'paid']),
            'recorded_by' => $this->faker->randomElement(['jasur', 'nodira', 'hilola'])
        ];
    }
}
