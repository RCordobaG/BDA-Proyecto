<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuilleController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\EstudiosController;
use App\Http\Controllers\CrearMedicosController;
use App\Http\Controllers\CrearPacientesController;
use App\Http\Controllers\CrearEstudiosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('index', HospitalController::class);
Route::get('medicos',[MedicoController::class,'getImage']);
Route::resource('medicos', MedicoController::class);
Route::resource('estudios', EstudiosController::class);
Route::resource('pacientes', PacientesController::class);
Route::get('GuilleHealing',[GuilleController::class,'getImage']);
Route::resource('GuilleHealing', GuilleController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
