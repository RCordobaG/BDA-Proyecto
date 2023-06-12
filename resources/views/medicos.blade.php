@extends ('layout.base')
@section ('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Medicos</h2>
        </div>
        <div>
            <a href="" class="btn btn-primary">Crear tarea</a>
        </div>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Matricula</th>
                <th>Nombre</th>
                <th>Especialidad</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
            @foreach($getMedico as $getMedico)
            <tr>
                <td class="fw-bold">{{$getMedico->MATRICULA}}</td>
                <td class="fw-bold">{{$getMedico->Nombre}}</td>
                <td class="fw-bold">{{$getMedico->Especialidad}}</td>
                <td><img src="data:image/png;base64,{{chunk_split(base64_encode($getMedico->Foto))}}"/></td>
                <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                </button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

