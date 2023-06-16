<?php

namespace App\Http\Controllers;

use App\Models\CrearMedicosModel;
use Illuminate\Http\Request;

class CrearMedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicos=CrearMedicosModel::latest()->get();
        return view('crearMedico',['crearMedico'=>$medicos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crearMedico.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'MATRICULA' => 'required',
            'Nombre' => 'required',
        ]);
        CrearMedicosModel::create($request->post());
        return redirect()->route('crearMedico.index')->with('success','Medico creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(CrearMedicosModel $crearMedicosModel)
    {
        return view('crearMedico.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CrearMedicosModel $crearMedicosModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CrearMedicosModel $crearMedicosModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CrearMedicosModel $crearMedicosModel)
    {
        $CrearMedicosModel->delete();
        return redirect()->route('crearEstudio.index')->with('success','Registro eliminado');
    }
}
