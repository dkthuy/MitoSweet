<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineCourses extends Model
{
    protected $fillable = [
        'course_id','title', 'img', 'summary', 'detail', 'level', 'price', 'promo_price', 'lesson', 'trailer', 'video',
    ];
}
