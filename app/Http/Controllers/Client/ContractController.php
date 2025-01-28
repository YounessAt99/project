<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\BasicGuarantee;
use App\Models\Contract;
use App\Models\Guarantees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $animals = Animal::where('user_id', $user->id)->with('contract.payment','contract.formcard')->get();
  
        // dd($animals);

        return view('client.contract.index',[
            'animals' => $animals,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $animal = Animal::where('user_id', $user->id)->with('breed','age','breedType','contract.payment', 'contract.formcard')->findOrFail($id);
        $guarantees = Guarantees::where(['form_card_id'=>$animal->contract->formcard->id, 'breed_type_id'=>$animal->breed_type_id])->get();

        $basicGuarantee = BasicGuarantee::all();
        // dd($basicGuarantee);
        
        
        return view('client.contract.show',[
            'animal' => $animal,
            'guarantees' => $guarantees,
            'basicGuarantee' => $basicGuarantee
        ]);
    }

}
