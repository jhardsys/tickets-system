<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Administrator;
use App\Models\Comment;
use App\Models\Ticket;
use App\Models\Agent;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Ticket::factory(10)->has(Comment::factory()->count(3))->create();

        User::factory()
            ->recycle(Administrator::factory()->create())
            ->create([
                'email' => 'admin@test.com',
                'password' => Hash::make('admin'),
                'userable_type' => 'App\Models\Administrator',
                'userable_id' => '1'
            ]);

        User::factory()
            ->recycle(Administrator::factory()->create())
            ->create([
                'email' => 'erickramirez.dnbk@gmail.com',
                'password' => Hash::make('admin'),
                'userable_type' => 'App\Models\Administrator',
                'userable_id' => '2'
            ]);

        User::factory()
            ->recycle(Agent::factory()->create())
            ->create([
                'email' => 'agent@test.com',
                'password' => Hash::make('agent'),
                'userable_type' => 'App\Models\Agent',
                'userable_id' => '1'
            ]);

        // User::factory()
        //     ->recycle(Agent::factory()->create())
        //     ->create([
        //         'email' => '1362733@senati.com',
        //         'password' => Hash::make('agent'),
        //         'userable_type' => 'App\Models\Agent',
        //         'userable_id' => '2'
        //     ]);

        User::factory()
            ->recycle(Client::factory()->create())
            ->create([
                'email' => 'client@test.com',
                'password' => Hash::make('client'),
                'userable_type' => 'App\Models\Client',
                'userable_id' => '1'
            ]);

        User::factory()
            ->recycle(Client::factory()->create())
            ->create([
                'email' => 'erickramirez.dnbk@hotmail.com',
                'password' => Hash::make('client'),
                'userable_type' => 'App\Models\Client',
                'userable_id' => '2'
            ]);

        // Administrator::factory()->create([
        //     'first_name' => 'Admin',
        //     'first_surname' => 'Test',
        //     'second_surname' => 'Test',

        //     'phone' => '1234567890',
        // ]);
        // Agent::factory()->create([
        //     'first_name' => 'Agent',
        //     'first_surname' => 'Test',
        //     'second_surname' => 'Test',

        //     'phone' => '1234567890',
        // ]);
        // Client::factory()->create([
        //     'first_name' => 'Client',
        //     'first_surname' => 'Test',
        //     'second_surname' => 'Test',

        //     'phone' => '1234567890',
        // ]);
    }
}
