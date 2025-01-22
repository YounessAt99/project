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
            $data = $this->stepService->getStep2Data();

        } elseif ($step == 3) {
            $data = $this->stepService->getStep3Data();

        } elseif ($step == 4){
            $data = $this->stepService->getStep4Data();

        } elseif ($step == 5) {
            $data = $this->stepService->getStep5Data();

        } elseif ($step == 6) {
            $data = $this->stepService->getStep6Data();

        } elseif ($step == 7) {
            $data = $this->stepService->getStep7Data();

        } if ($step == 8) {
            $data = $this->stepService->getStep8Data();
        }
        // dd($data);
        
        return view("registration.step{$step}")->with('data',$data);
    }

    public function processStep(Request $request, $step)
    {
        $rules = $this->getValidationRules($step);

        $validatedData = $request->validate($rules);
        // dd($validatedData);

        session()->put("step{$step}", $validatedData);
        // dd(session('step6'));

        // Redirect to the next step
        if ($step < 8) {
            return redirect()->route('register.step', ['step' => $step + 1]);
        }

        // Redirect to the confirmation page
        return redirect()->route('register.complete');
    }

    private function getValidationRules($step)
    {
        $rules = [
            1 => ['animal_type' => 'required|in:1,2', 'animal_name' => 'required|max:255'],
            2 => ['animal_breed' => 'required|max:255','animal_age' => 'required','sexe' => 'required'],
            3 => ['address' => 'required'],
            4 => [
                'first_name' => 'required|string|max:255', 'last_name' => 'required|string|max:255',
                'email' => 'required|email', 'check_accept' => 'required',
                'phone' => ['required', 'regex:/^(?:\+212|212|0)([0-9]){9}$/'],
            ],
            5 => ['pack' => 'required'],
            6 => ['selectedGuarantees' => 'array'],
            7 => ['mantant' => 'required|decimal:2,4', 'date' => 'required|date', 'accept'=>'required|accepted' ],
        ];
        // dd($rules[$step]);

        return $rules[$step] ?? [];
    }

    public function complete()
    {
        $data = [];
        for ($i = 1; $i <= 5; $i++) {
            $data = array_merge($data, session("step{$i}", []));
        }
        dd('steps complete');

        // Save to database or process further
        // For example: \App\Models\Registration::create($data);

        // Clear session
        session()->flush();

        return view('registration.complete', compact('data'));
    }
}
