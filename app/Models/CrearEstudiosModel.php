<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrearEstudiosModel extends Model
{
    use HasFactory;
    protected $table = 'estudios';
    protected $fillable = ['NombreEstudio','IDPaciente','Archivo','Interpretacion','Audio','Video'];
}
