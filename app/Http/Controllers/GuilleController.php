<?php

namespace App\Http\Controllers;

use App\Models\guille;
use Illuminate\Http\Request;

class GuilleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getMedico=guille::latest()->get();
        return view('GuilleHealing',['getMedico'=>$getMedico]);
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
    public function show(guille $guille)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(guille $guille)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, guille $guille)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(guille $guille)
    {
        //
    }
}
