<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interfaces extends Model
{
    protected $fillable = [
        'item_id', 'item_value', 'pages_id',
    ];
}
