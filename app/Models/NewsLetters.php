<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsLetters extends Model
{
    protected $table= 'newsletters';
    protected $fillable = [
        'email'
    ];
}
