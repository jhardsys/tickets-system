<?php

namespace Database\Factories;

use App\Models\Agent;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "subject" => $this->faker->sentence(),
            "priority" => $this->faker->randomElement(["baja", "media", "alta"]),
            "status" => $this->faker->randomElement(["derivación al area especializada", "en proceso", "resuelto"]),
            "client_id" => Client::factory(),
            "agent_id" => Agent::factory(),
        ];
    }
}
