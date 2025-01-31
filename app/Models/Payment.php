<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'payment_date',
        'payment_type',
        'contract_id',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function contract():BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }
}
