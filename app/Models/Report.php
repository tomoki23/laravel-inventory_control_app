<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Input\Input;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'site_name',
        'member',
        'content',
        'created_at',
        'updated_at'
    ];

    public function registerReport($report)
    {

        //リクエスト情報を取得
        $user_name = $report->input('user_name');
        $site_name = $report->input('site_name');
        $members = $report->input('member');
        $content = $report->input('content');

        // メンバーの初期化
        $member_list = [];

        // メンバーリストに代入
        foreach ($members as $key => $val) {
            $member_list[] = $val;
        }

        //データベースに保存するために配列の要素を連結
        $members = implode(',', $member_list);


        //登録
        $this->create([
            'user_name' => $user_name,
            'site_name' => $site_name,
            'member' => $members,
            'content' => $content
        ]);
    }
}
