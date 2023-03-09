<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cakes extends Model
{
    protected $fillable = [
        'title', 'img', 'summary', 'detail', 'note', 'cake_types', 'code', 'price', 'cake_sizes',
    ];
}
