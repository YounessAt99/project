<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormCard extends Model
{
    protected $fillable = [
        'name',
        'insurance',
        'insurance_factor',
        'annual_limit',
        'annual_limit_factor',
        'advantage'
    ];

    public function guarantees():HasMany
    {
        return $this->hasMany(Guarantees::class);
    }
    
    public function animals():HasMany
    {
        return $this->hasMany(Animal::class);
    }
}
