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
            'NombreEstudio'=>'required',
            'IDPaciente'=>'required',
            'Interpretacion'=>'required',
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

        estudio::create($request->post());
        $estudios=estudio::latest()->get();
        return view('estudios',['estudios'=>$estudios]);
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
        $request->validate([
            'NombreEstudio'=>'required',
            'IDPaciente'=>'required',
            'Interpretacion'=>'required',
        ]);

        $estudio->fill($request->post())->save();
        $estudios=estudio::latest()->get();
        return view('estudios',['estudios'=>$estudios]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(estudio $estudio)
    {
        $estudio->delete();
        $estudios=estudio::latest()->get();
        return view('estudios',['estudios'=>$estudios]);
    }
}
