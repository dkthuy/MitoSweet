<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderCourses extends Model
{
    protected $fillable = [
        'bill_id', 'name', 'email','phone', 'note', 'status', 'course_id', 'discount', 'total'
    ];
}
