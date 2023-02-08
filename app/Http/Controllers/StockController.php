<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $tools = [
            ['name' => '刷毛', 'quantity' => 20],
            ['name' => 'ローラー', 'quantity' => 40],
            ['name' => 'シンナー', 'quantity' => 3],
        ];

        return view('index', compact('tools'));
    }
}
