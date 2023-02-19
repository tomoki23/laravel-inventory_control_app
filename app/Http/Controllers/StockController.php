<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockPostRequest;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tools = Stock::all();

        return view('index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockPostRequest $request)
    {
        $stock = new Stock();
        $stock->registerStock($request);

        return redirect('stocks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->input('id');

        //数を1増やす
        if ($request->has('plus')) {
            Stock::where('id', '=', $id)->increment('quantity', 1);
        }

        //数を1減らす
        if ($request->has('minus')) {
            Stock::where('id', '=', $id)->increment('quantity', -1);
        }

        return redirect('stocks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tool = Stock::find($id);
        $tool->delete();

        return redirect('stocks');
    }
}
