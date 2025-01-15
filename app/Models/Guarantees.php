<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Guarantees extends Model
{
    protected $fillable = [
        'logo',
        'title',
        'description',
        'price',
        'breed_type_id',
        'form_card_id'
    ];

    public function formCard():BelongsTo
    {
        return $this->belongsTo(FormCard::class);
    }

    public function typeRce():BelongsTo
    {
        return $this->belongsTo(BreedType::class);
    }
    
    public function animals():BelongsToMany
    {
        return $this->belongsToMany(Animal::class);
    }
}
