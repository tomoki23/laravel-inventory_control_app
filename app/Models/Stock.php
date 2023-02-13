<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'tool_name',
        'quantity',
        'created_at',
        'updated_at'
    ];

    public function RegisterStock($stock)
    {
        $this->create([
            'tool_name' => $stock['tool_name'],
            'quantity' => $stock['quantity']
        ]);
    }
}
