<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Report::insert([
            'user_name' => 'テストユーザー1',
            'site_name' => '鈴木邸',
            'member' => 'メンバー1',
            'content' => '今日の業務内容は〇〇です',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Report::insert([
            'user_name' => 'テストユーザー2',
            'site_name' => '佐藤邸',
            'member' => 'メンバー2',
            'content' => '今日の業務内容は〇〇です',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Report::insert([
            'user_name' => 'テストユーザー3',
            'site_name' => '高橋邸',
            'member' => 'メンバー3',
            'content' => '今日の業務内容は〇〇です',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
