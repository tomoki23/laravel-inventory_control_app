<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportPostRequest;
use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        $users = User::all();
        $authUser = Auth::user();

        return view('reports.create', compact('users', 'authUser'));
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
        $userId = $request->input('user_id');
        $memberId = $request->input('member_id');
        $siteName = $request->input('site_name');
        $content = $request->input('content');

        // データベースに登録
        $report = new Report();
        $report->user_id = $userId;
        $report->site_name = $siteName;
        $report->content = $content;
        $report->save();

        $report = Report::find($report->id);
        $report->users()->attach($memberId);
        $report->save();

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
        $members = Report::find($id)->users()->get();

        return view('reports.show', compact('report', 'members'));
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
        //$idのデータを取得
        $report = Report::find($id);

        //変更内容を更新
        $report->user_name = $request->input('user_name');
        $report->site_name = $request->input('site_name');
        $report->member = $request->input('member');
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
