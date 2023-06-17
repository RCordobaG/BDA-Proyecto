<?php

namespace App\Http\Controllers;

use App\Models\paciente;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes=paciente::latest()->get();
        return view('pacientes',['pacientes'=>$pacientes]);
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
        $request->validate([
            'Nombre'=>'required',
            'Direccion'=>'required',
            'email'=>'required',
        ]);
        
        // echo $request;

            
        // //Get the image and convert into string
        // $path = $request->input('Foto');
        // //$type = pathinfo($path,PATHINFO_EXTENSION);
        // $img = file_get_contents($path);
        
            
        // // Encode the image string data into base64
        // $data = base64_encode($img);
        // $newData = mb_convert_encoding($data,"binary");
            
        // // Display the output
        // echo $data;

        paciente::create($request->post());
        $pacientes=paciente::latest()->get();
        return view('pacientes',['pacientes'=>$pacientes]);
    }

    /**
     * Display the specified resource.
     */
    public function show(paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, paciente $paciente)
    {
        $request->validate([
            'Nombre'=>'required',
            'Direccion'=>'required',
            'email'=>'required',
        ]);

        $paciente->fill($request->post())->save();
        $pacientes=paciente::latest()->get();
        return view('pacientes',['pacientes'=>$pacientes]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(paciente $paciente)
    {
        $paciente->delete();
        $pacientes=paciente::latest()->get();
        return view('pacientes',['pacientes'=>$pacientes]);
    }
}
