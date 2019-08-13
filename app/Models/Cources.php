<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cources extends Model {
    // filable fields
    protected $fillable = [
        'name', 'capacity'
    ];
}