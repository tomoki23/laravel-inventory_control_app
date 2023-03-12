<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            'name' => '備品',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Category::insert([
            'name' => '材料',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
