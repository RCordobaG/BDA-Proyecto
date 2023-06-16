@extends ('layout.base')
@section ('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Estudios</h2>
        </div>
        <div>
            <a href="/crearEstudio" class="btn btn-primary">Crear tarea</a>
        </div>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Numero Estudio</th>
                <th>Estudio</th>
                <th>Paciente</th>
                <th>Vista previa</th>
                <th>Interpretacion</th>
                <th>Audio</th>
                <th>Acciones</th>
            </tr>
            @foreach($estudios as $estudios)

            <tr>
                <td class="fw-bold">{{$estudios->NumeroEstudio}}</td>
                <td class="fw-bold">{{$estudios->NombreEstudio}}</td>
                <td class="fw-bold">{{$estudios->IDPaciente}}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <img src="data:image/png;base64,{{chunk_split(base64_encode($estudios->Archivo))}}"/>
                    </button>
                </td>
                <td>{{$estudios->Interpretacion}}</td>
                <td><audio controls src="data:audio/mp3;base64,{{chunk_split(base64_encode($estudios->Audio))}}"></audio></td>
                <td>
                    <form action="{{ route('estudios.destroy',$estudios->NumeroEstudio) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('estudios.edit',$estudios->NumeroEstudio) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>

            </tr>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog"></div>
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <video width="200" height="200" controls>
                        
                        </video>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach
        </table>
    </div>
</div>
@endsection