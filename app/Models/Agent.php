<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'address',
        'specialization',
        'years_of_experience',
        'user_id',
        'assurance_id',
    ];
}
