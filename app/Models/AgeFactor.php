<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgeFactor extends Model
{
    protected $fillable = [
        'value', 'age_id', 'expected_life_id'
    ];

    public function expectedLife():BelongsTo
    {
        return $this->belongsTo(ExpectedLife::class);
    }

    public function age():BelongsTo
    {
        return $this->belongsTo(Age::class);
    }
}
