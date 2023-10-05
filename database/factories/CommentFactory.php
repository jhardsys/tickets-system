<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ticket_id' => Ticket::factory(),
            'body' => $this->faker->paragraph(),
            'commentable_id' => $this->faker->numberBetween(1, 10),
            'commentable_type' => $this->faker->randomElement(['App\Models\Agent', 'App\Models\Client']),
            'files_url' => $this->faker->imageUrl(),
        ];
    }
}
