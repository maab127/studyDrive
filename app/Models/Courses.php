<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model {
    // filable fields
    protected $fillable = [
        'name', 'capacity'
    ];

    public function CourseRegistrations(){
        return $this->hasMany('App\Models\Registration','course_id');
    }
}