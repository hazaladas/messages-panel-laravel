<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use  Database\Seeders\MessageSeeder;


class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            MessageSeeder::class,
        ]);

    }
}
