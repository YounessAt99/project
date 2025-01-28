<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Mail\AuthMail;
use App\Models\Animal;
use App\Models\Client;
use App\Models\Contract;
use App\Models\Payment;
use App\Models\User;
use App\Services\StepService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // if ($step < 1 || $step > 8) {
        //     abort(404);
        // }

        // Skip step 4 if the user is authenticated
        if (Auth::user() && ($step == 3 || $step == 4)) {
            return redirect()->route('register.step', ['step' => 5]);
        }
 
        for ($i = 1; $i < $step; $i++) {
            if (($i == 3 || $i == 4 )&& Auth::user()) {
                continue;
            }

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
            7 => ['mantant' => 'required|decimal:1,4', 'date' => 'required|date', 'accept'=>'required|accepted' ],
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
            if (Auth::user() && ($i == 3 || $i == 4)) {
                continue;
            }
            $data = array_merge($data, session("step{$i}", []));
        }
        
        // $existingUser = User::where('email', $data['email'])->first();
        if (empty($data)) {
            return redirect()->route('login');
        }
        
        if (Auth::user()) {

            $user = Auth::user();

        } else {
            
            $password = Str::random(10);
            $user = User::create([
                'name' => $data['first_name']. ' ' .$data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($password),
            ]);

            Client::create([
                'user_id' => $user->id,
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'address' => $data['address'],
                'phone' => $data['phone'],
            ]);
        }

        $animal = Animal::create([
            'user_id' => $user->id,
            'name' => $data['animal_name'],
            'sexe' => $data['sexe'],
            'breed_type_id' => $data['animal_type'],
            'breed_id' => $data['animal_breed'],
            'age_id' => $data['animal_age'],
        ]);

        $formattedDate = Carbon::createFromFormat('d/m/Y', $data['end_date'])->toDateString();
 

        $policyNumber = $this->generateUniquePolicyNumber($animal->id);
        $contract = Contract::create([
            'animal_id' => $animal->id,
            'form_card_id' => $data['pack'],
            'end_date' => $formattedDate,
            'policy_number' => $policyNumber,
        ]);

        $amount = session('step8')['payment'] == 'yearly' ?  $data['mantant'] * 12 : $data['mantant'] ;
        $amount = number_format( $amount ,2, '.', '');
        Payment::create([
            'user_id' => $user->id,
            'amount' =>  $amount,
            'payment_type' => $data['payment'],
            'payment_date' => now(),
            'contract_id' => $contract->id
        ]);
        
        if (!empty($data['selectedGuarantees'])) {
            $animal->guarantees()->sync($data['selectedGuarantees']);
        }

        if (!Auth::user()) {
            $loginUrl = route('login');
            Mail::to($user->email)->send(new AuthMail($user->name, $password, $loginUrl));
        }

        // session()->flush();
        for ($i = 1; $i <= 8; $i++) {
            if (Auth::user() && ($i == 3 || $i == 4)) {
                continue;
            }
            session()->forget("step{$i}");
        }
        session()->forget('pack');
        

        if (Auth::user()) {
            return to_route('dashboard');
        }

        return view('registration.complete');
    }

    private function generateUniquePolicyNumber($animalId)
    {
        $prefix = 'POL';
        $datePart = now()->format('Y-m'); // Current year and month, e.g., "2025-01"
        
        do {
            $randomPart = sprintf('%04d', random_int(1000, 9999)); // Random 4-digit number
            $policyNumber = "{$prefix}-{$datePart}-{$animalId}-{$randomPart}";
        } while (Contract::where('policy_number', $policyNumber)->exists());

        return $policyNumber;
    }
}
