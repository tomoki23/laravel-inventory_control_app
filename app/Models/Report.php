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
}
