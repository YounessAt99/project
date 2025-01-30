<?php

namespace App\Http\Controllers\Admin\Forms;

use App\Http\Controllers\Controller;
use App\Models\FormCard;
use Illuminate\Http\Request;

class FormCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formCards = FormCard::all();
        return view('admin.forms.formCard.index', compact('formCards'));
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
    public function show(FormCard $formCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormCard $formCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormCard $formCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FormCard $formCard)
    {
        //
    }
}
