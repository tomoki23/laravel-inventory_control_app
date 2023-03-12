<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReportRequest;
use App\Http\Requests\ReportPostRequest;
use App\Http\Requests\UpdateReportRequest;
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
    public function store(CreateReportRequest $request)
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
        $authUser = Auth::user();
        $users = User::all();

        return view('reports.edit', compact('report', 'authUser', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportRequest $request, $id)
    {
        //$idのデータを取得
        $report = Report::find($id);

        //リクエスト情報を取得
        $userId = $request->input('user_id');
        $memberId = $request->input('member_id');
        $siteName = $request->input('site_name');
        $content = $request->input('content');

        //変更内容を更新
        $report->user_id = $userId;
        $report->site_name = $siteName;
        $report->content = $content;
        $report->save();

        $report = Report::find($id);
        $report->users()->detach();
        $report->users()->attach($memberId);
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
