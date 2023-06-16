<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    use HasFactory;
    protected $table = 'pacientes';
    protected $fillable = ['ID','Nombre','Direccion','Telefono','email','Foto'];
    protected $primaryKey='ID';
}
