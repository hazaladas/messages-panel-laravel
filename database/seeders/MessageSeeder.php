<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        Message::insert([
            [
                'user_name' => 'Hazal Adaş',
                'user_mail' => 'hazal@gmail.com',
                'message' => 'Sistemde bir hata ile karşılaşıyorum.',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_name' => 'burak',
                'user_mail' => 'burak@gmail.com',
                'message' => 'Yeni özellik eklenebilir.',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_name' => 'melisa',
                'user_mail' => 'melisa@gmail.com',
                'message' => 'gecikme var.',
                'is_read' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
