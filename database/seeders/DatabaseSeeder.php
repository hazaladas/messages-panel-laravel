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
            'role' => 'user',
        ]);

        // Admin kullanıcısı oluştur
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'admin',
        ]);

        $this->call([
            MessageSeeder::class,
        ]);

    }
}
