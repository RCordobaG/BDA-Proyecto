@extends('layout.base')

@section('content')
<div class="text-info text-center">
    <h1 class="font-weight-bold">Sistema de Administración de Hospitales (DEMO)</h1>
    <h5>Bases de Datos Avanzadas Semestre 2023-2</h5>
</div>

<div class="row justify-content-center mt-5">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title text-center">Iniciar Sesión</h1>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Correo Electrónico" >
                            </div>
                         </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                        <div class="form-group">
                            <input type="password" name="title" class="form-control" placeholder="Contraseña" >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection