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
        // Tablodaki tüm verileri siler güncel olan tüm verileri ekler 
        Message::truncate();

        Message::insert([
            [
                'user_id' => 1,
                'user_name' => 'Hazal Adaş',
                'user_mail' => 'hazal@gmail.com',
                'message' => 'Sistemde bir hata ile karşılaşıyorum.',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 2,
                'user_name' => 'burak',
                'user_mail' => 'burak@gmail.com',
                'message' => 'Yeni özellik eklenebilir.',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'user_name' => 'melisa',
                'user_mail' => 'melisa@gmail.com',
                'message' => 'gecikme var.',
                'is_read' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 4,
                'user_name' => 'elif',
                'user_mail' => 'elif@gmail.com',
                'message' => 'güzel olmuş',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 5,
                'user_name' => 'irem',
                'user_mail' => 'irem@gmail.com',
                'message' => 'api eklenecek.',
                'is_read' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
