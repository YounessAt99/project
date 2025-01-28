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

        // dd($animal);
        $basicGuarantee = [
            // chat
            ["logo" => "images/consoltation2.png", "title" => "Consultations", "description" => "Votre compagnon n'est pas dans son assiette et présente des symptômes? Asheel rembourse la consultation à hauteur de ce qui est prévu par votre contrat."],
            ["logo" => "images/hospitalisation2.png", "title" => "Hospitalisation", "description" => "Certaines pathologies nécessitent d'hospitaliser votre compagnon. Pas de panique! Asheel s'occupe de la prise en charge de l'hospitalisation à hauteur de votre couverture."],
            ["logo" => "images/maladie2.png", "title" => "Maladie", "description" => "Les maladies représentent en moyenne 75% des frais de santé de votre compagnon. Les analyses, examens et soins liés aux pathologies de votre chien ou de votre chat sont en effet assez coûteux."],
            ["logo" => "images/medicament.png", "title" => "Prescriptions de médicaments", "description" => "Votre animal a besoin d'un traitement . II sera pris en charge à hauteur des garanties prévues par votre contrat."],
            ["logo" => "images/urgence.svg", "title" => "Urgences médicales en cas d'accident", "description" => "En cas d'accident, Asheel prendra en charge les frais liés à l'intervention chirurgicale, les frais d'hospitalisation ainsi que d'éventuels coûts liés à la rééducation de votre compagnon à hauteur de vos garanties."],
            
        ];
        // dd($basicGuarantee);
        
        return view('client.show',[
            'animal' => $animal,
            'basicGuarantee' => $basicGuarantee
        ]);
    }
}
