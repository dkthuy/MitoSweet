<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderCakes extends Model
{
    protected $fillable = [
        'bill_id', 'title', 'phone', 'date', 'name', 'address', 'size', 'type', 'price', 'subject', 'note','email','status'
    ];
}
