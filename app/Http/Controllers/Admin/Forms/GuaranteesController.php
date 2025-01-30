<?php

namespace App\Http\Controllers\Admin\Forms;

use App\Http\Controllers\Controller;
use App\Models\Guarantees;
use Illuminate\Http\Request;

class GuaranteesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guarantees = Guarantees::with('typeRce','formCard')->paginate() ;
        return view('admin.forms.guarantee.index', compact('guarantees')) ;
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
    public function show(Guarantees $guarantees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guarantees $guarantees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guarantees $guarantees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guarantees $guarantees)
    {
        //
    }
}
