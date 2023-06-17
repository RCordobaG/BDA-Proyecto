<?php

namespace App\Http\Controllers;

use App\Models\medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getMedico=medico::latest()->get();
        return view('medicos',['getMedico'=>$getMedico]);
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

        medico::create($request->post());
        $getMedico=medico::latest()->get();
        return view('medicos',['getMedico'=>$getMedico]);
    }

    /**
     * Display the specified resource.
     */
    public function show(medico $medico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(medico $medico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, medico $medico)
    {
        $request->validate([
            'Nombre'=>'required',
        ]);

        $medico->fill($request->post())->save();
        $getMedico=medico::latest()->get();
        return view('medicos',['getMedico'=>$getMedico]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(medico $medico)
    {
        $medico->delete();
        $getMedico=medico::latest()->get();
        return view('medicos',['getMedico'=>$getMedico]);
    }
}
