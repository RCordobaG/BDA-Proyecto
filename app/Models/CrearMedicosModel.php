<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrearMedicosModel extends Model
{
    use HasFactory;
    protected $table = 'medico';
    protected $fillable = ['MATRICULA','Nombre','Especialidad','Foto'];
}
