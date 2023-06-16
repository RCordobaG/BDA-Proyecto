<?php

namespace App\Http\Controllers;

use App\Models\CrearEstudiosModel;
use Illuminate\Http\Request;

class CrearEstudiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudios=CrearEstudiosModel::latest()->get();
        return view('crearEstudio',['crearEstudio'=>$estudios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('CrearEstudios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NombreEstudio'=>'required',
            'IDPaciente'=>'required',
            'Archivo'=>'required',
            'Interpretacion'=>'required',
        ]);
        

        CrearEstudiosModel::create($request->post());
        return redirect()->route('crearEstudio.index')->with('success','Estudio Has Been updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(CrearEstudiosModel $CrearEstudiosModel)
    {
        return view('estudios.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CrearEstudiosModel $CrearEstudiosModel)
    {
        return view('estudios.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CrearEstudiosModel $CrearEstudiosModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CrearEstudiosModel $CrearEstudiosModel)
    {
        //
    }

}
