<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model{
    // filable fields
    protected $fillable = [
        'student_id', 'course_id','registered_on'
    ];
}