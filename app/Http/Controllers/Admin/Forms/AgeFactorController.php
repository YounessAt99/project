<?php

namespace App\Http\Controllers\Admin\Forms;

use App\Http\Controllers\Controller;
use App\Models\AgeFactor;
use Illuminate\Http\Request;

class AgeFactorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ageFactors = AgeFactor::with('expectedLife','age')->paginate();
        return view('admin.forms.ageFactor.index', compact('ageFactors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AgeFactor $ageFactor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgeFactor $ageFactor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AgeFactor $ageFactor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgeFactor $ageFactor)
    {
        //
    }
}
