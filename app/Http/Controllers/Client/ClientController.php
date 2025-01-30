<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Contract;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * @return response()
     */
    public function dashboard()
    {
        $user = Auth::user();


        $animals = Animal::where('user_id', $user->id)->get();
        $animalsCount = $animals->count();

        $contracts = Contract::where('animal_id', $animals->first()->id)->with('payment','formcard')->latest()->first();

        // dd($contracts);

        return view('client.dashboard', [
            'user' => $user,
            'animals' => $animals,
            'animalsCount' => $animalsCount,
            'contracts' => $contracts,
        ]);
    }

    public function index()
    {
        $user = Auth::user();
        $animals = Animal::where('user_id', $user->id)->with('breed','age','breedType','contract')->get();
        // dd($animals);
        return view('client.index',[
            'animals' => $animals,
        ]);
    }

    public function show($id)
    {
        $user = Auth::user();
        $animal = Animal::where('user_id', $user->id)->with('breed','age','breedType','contract','guarantees')->findOrFail($id);
        // dd($animal);
        
        return view('client.show',[
            'animal' => $animal
        ]);
    }
}
