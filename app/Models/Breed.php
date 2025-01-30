<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Breed extends Model
{
    protected $fillable= [
        'name',
        'expected_life_id',
        'breed_type_id',
        'breed_factor'
    ];

    public function animal():HasMany
    {
        return $this->hasMany(Animal::class);
    }

    public function breedTyp():BelongsTo
    {
        return $this->belongsTo(BreedType::class,'breed_type_id');
    }

    public function expected():BelongsTo
    {
        return $this->belongsTo(ExpectedLife::class,'expected_life_id');
    }
}
