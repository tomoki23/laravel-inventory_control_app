<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    public function index()
    {
        $tools = Stock::all();

        return view('index', compact('tools'));
    }
}
