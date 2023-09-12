<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Administrator;
use App\Models\Comment;
use App\Models\Ticket;
use App\Models\Agent;
use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Ticket::factory(10)->has(Comment::factory()->count(3))->create();
        Administrator::factory()->create([
            'first_name' => 'Admin',
            'first_surname' => 'Test',
            'second_surname' => 'Test',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin'),
            'phone' => '1234567890',
        ]);
        Agent::factory()->create([
            'first_name' => 'Agent',
            'first_surname' => 'Test',
            'second_surname' => 'Test',
            'email' => 'agent@test.com',
            'password' => Hash::make('agent'),
            'phone' => '1234567890',
        ]);
        Client::factory()->create([
            'first_name' => 'Client',
            'first_surname' => 'Test',
            'second_surname' => 'Test',
            'email' => 'client@test',
            'password' => Hash::make('client'),
            'phone' => '1234567890',
        ]);
    }
}
