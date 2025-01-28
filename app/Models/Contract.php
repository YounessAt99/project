<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contract extends Model
{
    protected $fillable = [
        'animal_id',
        'form_card_id',
        'end_date',
        'status',
        'policy_number'
    ];

    public function animal():BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }
    public function formcard():BelongsTo
    {
        return $this->belongsTo(FormCard::class, 'form_card_id');
    }
    
    public function payment():HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
