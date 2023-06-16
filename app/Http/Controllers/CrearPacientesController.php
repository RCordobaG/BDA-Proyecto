<?php

namespace App\Http\Controllers;

use App\Models\CrearPacientesModel;
use Illuminate\Http\Request;

class CrearPacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes=CrearPacientesModel::latest()->get();
        return view('crearPaciente',['crearPaciente'=>$pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crearPaciente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID' => 'required',
            'Nombre' => 'required',
            'Direccion'=>'required',
            'email'=>'email',
        ]);
        CrearPacientesModel::create($request->post());
        return redirect()->route('crearPaciente.index')->with('success','Pacientes creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(CrearPacientesModel $crearPacientesModel)
    {
        return view('crearPaciente.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CrearPacientesModel $crearPacientesModel)
    {
        return view('crearEstudio.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CrearPacientesModel $crearPacientesModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CrearPacientesModel $crearPacientesModel)
    {
        $CrearPacientesModel->delete();
        return redirect()->route('crearEstudio.index')->with('success','Registro eliminado');
    }
}
