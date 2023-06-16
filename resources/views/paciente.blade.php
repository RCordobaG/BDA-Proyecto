@extends ('layout.base')
@section ('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Pacientes</h2>
        </div>
        <div>
            <a href="/crearPaciente" class="btn btn-primary">Crear tarea</a>
        </div>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>ID</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>email</th>
                <th>Medico Tratante</th>
                <th>Acciones</th>
            </tr>
            @foreach($getMedico as $getMedico)
            <tr>
                <td class="fw-bold">{{$getMedico->ID}}</td>
                <td><img src="data:image/png;base64,{{chunk_split(base64_encode($getMedico->Foto))}}"/></td>
                <td class="fw-bold">{{$getMedico->Nombre}}</td>
                <td class="fw-bold">{{$getMedico->Direccion}}</td>
                <td class="fw-bold">{{$getMedico->Telefono}}</td>
                <td class="fw-bold">{{$getMedico->email}}</td>
                <td class="fw-bold">{{$getMedico->MedicoTratante}}</td>
                <td>
                    <form action="{{ route('pacientes.destroy',$getMedico->ID) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('pacientes.edit',$getMedico->ID) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>