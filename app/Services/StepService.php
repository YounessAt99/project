<?php

namespace App\Services;

use App\Models\Age;
use App\Models\AgeFactor;
use App\Models\AnnualBaseRate;
use App\Models\Breed;
use App\Models\Guarantees;
use Illuminate\Support\Facades\DB;



class StepService
{
    public function getStep2Data()
    {
        $breedType = session()->get('step1');

        return [
            'ages' => Age::all(),
            'breeds' => Breed::where('breed_type_id',$breedType['animal_type'])->get(),
            'animal_name' => $breedType['animal_name']
        ];
    }

    public function getStep3Data()
    {
        $animalData = session()->get('step1');
        
        return $animalData;
    }
    
    public function getStep4Data()
    {
        $animalData = session()->get('step1');

        return $animalData;
    }

    public function getStep5Data()
    {
        $annualbaseRate = AnnualBaseRate::value('value');

        $animalData = session('step2');
        $animal_breed = $animalData['animal_breed'];
        $animal_age = $animalData['animal_age'];

        $breedFactor = Breed::where('id',$animal_breed)->value('breed_factor') ;
        $expectedLife = Breed::where('id',$animal_breed)->value('expected_life_id') ;
        $ageFactor = AgeFactor::where(['age_id'=>$animal_age, 'expected_life_id'=>$expectedLife])->value('value') ;
        
        $result = $breedFactor * $ageFactor * $annualbaseRate;

        $data = [
            1 => ['id' => 1, 'type' => 'Confort', 'value'=> number_format($result * 0.89 * 0.702 / 12 ,2, '.', '') ],
            2 => ['id' => 2, 'type' => 'Complet', 'value'=> number_format($result * 1.066 * 0.8814 / 12 ,2, '.', '') ],
            3 => ['id' => 3, 'type' => 'Premium', 'value'=> number_format($result * 1.224 * 1.066 / 12 ,2, '.', '') ],
        ];
        session()->put('pack',$data);
        
        return $data;
    }
    
    public function getStep6Data()
    {
        $breedType = session()->get('step1');
        $form_id = session()->get('step5')['pack'];

        return [
            Guarantees::where(['breed_type_id'=>$breedType['animal_type'], 'form_card_id'=>$form_id ])->get(),
            $data[1] = $breedType['animal_name']
        ];
    }

}
