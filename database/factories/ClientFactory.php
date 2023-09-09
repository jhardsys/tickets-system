<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'first_surname' => fake()->lastName(),
            'second_surname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => fake()->password(),
            'phone' => fake()->phoneNumber(),
        ];
    }
}
