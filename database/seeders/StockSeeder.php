<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stock::insert([
            'tool_name' => '刷毛',
            'quantity' => 10,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Stock::insert([
            'tool_name' => 'ローラー',
            'quantity' => 20,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Stock::insert([
            'tool_name' => 'シンナー',
            'quantity' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
