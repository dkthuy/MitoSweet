<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $fillable = [
        'img','name', 'password','fullname','email','phone','status','type'
    ];
}
