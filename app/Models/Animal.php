<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Animal extends Model
{
    protected $fillable = [
        'name',
        'image',
        'sexe',
        'age_id',
        'breed_type_id',
        'breed_id',
        'user_id',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function breed():BelongsTo
    {
        return $this->belongsTo(Breed::class);
    }

    public function age():BelongsTo
    {
        return $this->belongsTo(Age::class);
    }

    public function breedType():BelongsTo
    {
        return $this->belongsTo(BreedType::class);
    }
    
    public function guarantees():BelongsToMany
    {
        return $this->belongsToMany(Guarantees::class);
    }
    
    public function contract():HasOne
    {
        return $this->hasOne(Contract::class);
    }
    
    // if animal has guarantee id return true
    public function hasGuarantee($guarantee){
        return $this->guarantees->contains($guarantee);
    }

}
