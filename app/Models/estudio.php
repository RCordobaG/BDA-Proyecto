<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudio extends Model
{
    use HasFactory;
    protected $table = "estudios";
    protected $fillable = ["NumeroEstudio","NombreEstudio","IDPaciente","Archivo","Interpretacion","Audio","Video"];
    protected $primaryKey = "NumeroEstudio";
}
