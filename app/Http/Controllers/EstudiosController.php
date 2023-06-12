<?php

namespace App\Http\Controllers;

use App\Models\estudio;
use Illuminate\Http\Request;

class EstudiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getMedico=estudio::latest()->get();
        return view('estudios',['getMedico'=>$getMedico]);
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
    public function show(estudio $estudio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(estudio $estudio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, estudio $estudio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(estudio $estudio)
    {
        //
    }
}
