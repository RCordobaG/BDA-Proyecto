<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medico extends Model
{
    use HasFactory;
    protected $table = "medico";
    protected $fillable = ["MATRICULA","Nombre","Especialidad","Foto"];
    protected $primaryKey = "MATRICULA";
}
