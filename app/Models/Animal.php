<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Animal extends Model
{
    protected $fillable = [
        'name',
        'policy_number',
        'image',
        'sexe',
        'age_id',
        'breed_type_id',
        'breed_id',
        'client_id',
        'form_card_id',
    ];

    public function client():BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function breed():BelongsTo
    {
        return $this->belongsTo(Breed::class);
    }

    public function age():BelongsTo
    {
        return $this->belongsTo(Age::class);
    }

    public function typeRace():BelongsTo
    {
        return $this->belongsTo(BreedType::class);
    }
    
    public function formCard():BelongsTo
    {
        return $this->belongsTo(FormCard::class);
    }
    
    public function guarantees():BelongsToMany
    {
        return $this->belongsToMany(Guarantees::class);
    }
    
    
    // infoGeneral and animal
    // public function infoGenerals():BelongsToMany
    // {
    //     return $this->belongsToMany(InfoGeneral::class);
    // }
    
    // public function animalImgs():HasMany
    // {
    //     return $this->hasMany(AnimalImgs::class);
    // }
    // public function animalDocs():HasMany
    // {
    //     return $this->hasMany(AnimalDocs::class);
    // }
    // public function animalWeights():HasMany
    // {
    //     return $this->hasMany(AnimalWeights::class);
    // }
    // public function animalOptions():HasMany
    // {
    //     return $this->hasMany(AnimalOptions::class);
    // }
    // public function animalContractAssurance():HasMany
    // {
    //     return $this->hasMany(AnimalInsuranceContract::class);
    // }

    // if animal has guarantee id return true
    public function hasGuarantee($guarantee){
        return $this->guarantees->contains($guarantee);
    }
    
    // if animal has veterinaire id return true
    // public function hasVeterinaire($veterinaire){
    //     return $this->veterinaires->contains($veterinaire);
    // }

    // if animal has infoGeneral return truw
    public function hasInfoGeneral($info){
        return $this->infoGenerals->contains($info);
    }
}
