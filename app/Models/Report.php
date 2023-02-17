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

        $user_name = $report->input('user_name');
        $site_name = $report->input('site_name');
        $members = $report->input('member');
        $content = $report->input('content');

        foreach ($members as $key => $val) {
            if ($val === '1') {
                $member_list[] = 'ユーザー1';
            } else if ($val === '2') {
                $member_list[] = 'ユーザー2';
            } else if ($val === '3') {
                $member_list[] = 'ユーザー3';
            }
        }

        $members = implode(',', $members);


        $this->create([
            'user_name' => $user_name,
            'site_name' => $site_name,
            'member' => $members,
            'content' => $content
        ]);
    }
}
