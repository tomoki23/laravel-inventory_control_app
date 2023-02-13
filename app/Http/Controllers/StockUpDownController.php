<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockUpDownController extends Controller
{
    public function upDownCounter(Request $request)
    {
        $upCount = $request->has('plus');
        $downCount = $request->has('minus');
        $id = $request->input('id');

        //数を1増やす
        if ($upCount) {
            Stock::where('id', '=', $id)->increment('quantity', 1);
        }

        //数を1減らす
        if ($downCount) {
            Stock::where('id', '=', $id)->increment('quantity', -1);
        }

        return redirect('stocks');
    }
}
