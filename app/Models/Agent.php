<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        // 'assurance_id',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // public function assurance(){
    //     return $this->belongsTo(Assurance::class);
    // }
}
