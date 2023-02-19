<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportPostRequest;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = Report::all();
        return view('reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportPostRequest $request)
    {
        //リクエスト情報を取得
        $user_name = $request->input('user_name');
        $site_name = $request->input('site_name');
        $members = $request->input('member');
        $content = $request->input('content');

        // データベースに登録
        Report::create([
            'user_name' => $user_name,
            'site_name' => $site_name,
            'member' => $members[0],
            'content' => $content
        ]);

        return redirect('reports');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::find($id);

        return view('reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = Report::find($id);

        return view('reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReportPostRequest $request, $id)
    {
        $report = Report::find($id);

        $report->user_name = $request->input('user_name');
        $report->site_name = $request->input('site_name');

        $member_list = [];
        if ($request->member) {
            foreach ($request->member as $key => $val) {
                $member_list[] = $val;
            }
        }

        $report->member = implode(',', $member_list);

        $report->content = $request->input('content');
        $report->save();

        return redirect('reports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = Report::find($id);
        $report->delete();

        return redirect('reports');
    }
}
