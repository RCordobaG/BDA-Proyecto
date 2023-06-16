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
        $estudios=estudio::latest()->get();
        return view('estudios',['estudios'=>$estudios]);

        // $estudios = estudio::orderBy('NumeroEstudio','desc');
        // return view('estudios',['estudios'=>$estudios]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estudios.create');
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
        

        estudio::create($request->post());
        $estudios=estudio::latest()->get();
        return view('estudios',['estudios'=>$estudios]);
    }

    /**
     * Display the specified resource.
     */
    public function show(estudio $estudio)
    {
        return view('estudios');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(estudio $estudio)
    {
        return view('estudios');
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
        $estudio->delete();
        $estudios=estudio::latest()->get();
        return view('estudios',['estudios'=>$estudios]);

        //return redirect()->route('estudios')->with('success','Registro eliminado');
    }
}
