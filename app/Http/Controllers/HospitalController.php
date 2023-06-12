<?php

namespace App\Http\Controllers;

use App\Models\hospitalModel;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
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
    public function show(hospitalModel $hospitalModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(hospitalModel $hospitalModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, hospitalModel $hospitalModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(hospitalModel $hospitalModel)
    {
        //
    }
}
