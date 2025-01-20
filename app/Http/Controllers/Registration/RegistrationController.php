<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Services\CalculationService;
use App\Services\StepService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RegistrationController extends Controller
{
    protected $stepService;

    public function __construct(StepService $stepService)
    {
        $this->stepService = $stepService;
    }

    public function showStep($step)
    {
        if ($step < 1 || $step > 8) {
            abort(404);
        }

        // validation donner input 4 
        for ($i = 1; $i < $step; $i++) {
            if (!session()->has("step{$i}")) {
                return redirect()->route('register.step', ['step' => $i])
                    ->with('error', 'Veuillez terminer cette étape avant de passer aux étapes suivantes.');
            }
        }
    
        $data = [];

        if ($step == 2) {
            $animalData = $this->stepService->getStep2Data();
            $data = $animalData;

        } elseif ($step == 3) {
            $animalData = $this->stepService->getStep3Data();
            $data = $animalData;

        } elseif ($step == 4){
            $animalData = $this->stepService->getStep4Data();
            $data = $animalData;

        } elseif ($step == 5) {
            $dataGuarantees = $this->stepService->getStep5Data();
            $data = $dataGuarantees;

        } elseif ($step == 6) {
            $dataGuarantees = $this->stepService->getStep6Data();
            $data = $dataGuarantees;
        }
        
        return view("registration.step{$step}")->with('data',$data);
    }

    public function processStep(Request $request, $step)
    {
        $rules = $this->getValidationRules($step);

        $validatedData = $request->validate($rules);

        session()->put("step{$step}", $validatedData);

        // Redirect to the next step
        if ($step < 8) {
            return redirect()->route('register.step', ['step' => $step + 1]);
        }

        // Redirect to the confirmation page
        return redirect()->route('register.complete');
    }

    private function getValidationRules($step)
    {
        // dd($step);
        $rules = [
            1 => ['animal_type' => 'required|in:1,2', 'animal_name' => 'required'],
            2 => ['animal_breed' => 'required','animal_age' => 'required','sexe' => 'required'],
            3 => ['address' => 'required'],
            4 => [
                'first_name' => 'required|string', 'last_name' => 'required|string',
                'email' => 'required|email', 'check_accept' => 'required',
                'phone' => ['required', 'regex:/^(?:\+212|212|0)([0-9]){9}$/'],
            ],
            5 => ['pack' => 'required'],
        ];

        return $rules[$step] ?? [];
    }

    public function complete()
    {
        $data = [];
        for ($i = 1; $i <= 7; $i++) {
            $data = array_merge($data, session("step{$i}", []));
        }

        // Save to database or process further
        // For example: \App\Models\Registration::create($data);

        // Clear session
        session()->flush();

        return view('registration.complete', compact('data'));
    }
}
