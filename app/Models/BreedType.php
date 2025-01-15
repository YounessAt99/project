<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BreedType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function breed():HasMany
    {
        return $this->hasMany(Breed::class);
    }

    public function guarantees():HasMany
    {
        return $this->hasMany(Guarantees::class);
    }
}
