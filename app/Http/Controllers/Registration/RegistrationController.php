<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Mail\AuthMail;
use App\Models\Animal;
use App\Models\Client;
use App\Models\User;
use App\Services\CalculationService;
use App\Services\StepService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
        
        return view("registration.step{$step}")->with('data',$data);
    }

    public function processStep(Request $request, $step)
    {
        $rules = $this->getValidationRules($step);

        $validatedData = $request->validate($rules);

        session()->put("step{$step}", $validatedData);

        if ($step < 8) {
            return redirect()->route('register.step', ['step' => $step + 1]);
        }

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
                'email' => 'required|email|unique:users,email', 'check_accept' => 'required',
                'phone' => ['required', 'regex:/^(?:\+212|212|0)([0-9]){9}$/'],
            ],
            5 => ['pack' => 'required'],
            6 => ['selectedGuarantees' => 'array'],
            7 => ['mantant' => 'required|decimal:2,4', 'date' => 'required|date', 'accept'=>'required|accepted' ],
            8 => [
                'payment' => 'required|in:monthly,yearly',
                'cardnum' => ['required', 'regex:/^[0-9]{16}$/'],
                'expiry' => ['required', 'regex:/^(0[1-9]|1[0-2])\/[0-9]{2}$/'],
                'cvc' => 'required|digits:3',
            ]
        ];

        return $rules[$step] ?? [];
    }

    public function complete()
    {
        $data = [];
        for ($i = 1; $i <= 8; $i++) {
            $data = array_merge($data, session("step{$i}", []));
        }
        // dd($data);

        $password = Str::random(10);
        $user = User::create([
            'name' => $data['first_name']. ' ' .$data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($password),
        ]);

        $client = Client::create([
            'user_id' => $user->id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'phone' => $data['phone'],
        ]);

        $animal = Animal::create([
            'client_id' => $client->id,
            'name' => $data['animal_name'],
            'sexe' => $data['sexe'],
            'breed_type_id' => $data['animal_type'],
            'breed_id' => $data['animal_breed'],
            'age_id' => $data['animal_age'],
            'form_card_id' => $data['pack'],
            'policy_number' => $password,
        ]);
        $animal->guarantees()->sync($data['selectedGuarantees']);

        // $r = [
        //     'pack' => $data['pack'],
        //     'selectedGuarantees' => $data['selectedGuarantees'],
        //     'mantant' => $data['mantant'],
        //     'date' => $data['date'],
        //     'payment' => $data['payment'],
        //     'cardnum' => $data['cardnum'],
        //     'expiry' => $data['expiry'],
        //     'cvc' => $data['cvc'],
        //     'check_accept' => $data['check_accept'],
        // ];

        $loginUrl = route('login');
        Mail::to($user->email)->send(new AuthMail($user->name, $loginUrl));
        // session()->flush();

        return view('registration.complete');
    }
}
