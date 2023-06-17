@extends ('layout.base')
@section ('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Medicos</h2>
        </div>
        <div>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearModal">
                Crear tarea
                </button>
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
                <td><img src="{{$getMedico->Foto}}"/></td>
                <td>
                    <form action="{{ route('medicos.destroy',$getMedico->MATRICULA) }}" method="Post">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarModal{{$getMedico->MATRICULA}}">
                        Crear tarea
                    </button>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <div class="modal fade" id="editarModal{{$getMedico->MATRICULA}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('medicos.update',$getMedico->MATRICULA) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>ID:</strong>
                        <input type="text" name="MATRICULA" value="{{ $getMedico->MATRICULA }}" class="form-control"
                            placeholder="ID">
                        @error('ID')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="Nombre" value="{{$getMedico->Nombre}}" class="form-control" placeholder="Nombre"
                            value="{{ $getMedico->Nombre }}">
                        @error('Nombre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Direccion:</strong>
                        <input type="text" name="Especialidad" value="{{ $getMedico->Especialidad }}" class="form-control"
                            placeholder="Direccion">
                        @error('Especialidad')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Foto:</strong>
                            <input type="file" name="FotoInputUpdate" id = "FotoInputUpdate" value = "{{$getMedico->Foto}}" class="form-control" placeholder="Archivo">
                            @error('FotoInput')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Foto:</strong>
                            <input type="text" value = "{{$getMedico->Foto}}" name="FotoUpdate" id = "FotoUpdate" class="moleConPollo" placeholder="Archivo">
                            @error('Foto')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
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

<div class="modal fade" id="crearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('medicos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Matricula:</strong>
                        <input type="text" name="MATRICULA" class="form-control" placeholder="# Matricula">
                        @error('MATRICULA')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="Nombre" class="form-control" placeholder="Nombre">
                        @error('Nombre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Especialidad:</strong>
                        <input type="text" name="Especialidad" class="form-control" placeholder="Especialidad">
                        @error('Especialidad')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Foto:</strong>
                            <input type="file" name="FotoInput" id = "FotoInput" src = "" class="form-control" placeholder="Archivo">
                            @error('FotoInput')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Foto:</strong>
                            <input type="text" value = "" name="Foto" id = "Foto" class="mole" placeholder="Archivo">
                            @error('Foto')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                </div>

                <div class="box">
                    <div class="images">
                    <img class="mole" />
                    <img class="mole" />
                    </div>
                </div>

            <script>
                const fileInput = document.getElementById('FotoInput');

                const images =  document.querySelectorAll('.mole');

                fileInput.addEventListener('change', (e) =>{
                    const file = e.target.files[0];

                    let fileReader = new FileReader();
                    fileReader.readAsDataURL(file);
                    fileReader.onload = function (){
                        images[0].setAttribute('value', fileReader.result);
                        images[1].setAttribute('src', fileReader.result);
                        console.log(fileReader.result);
                        // images[0].setAttribute('style', `background-image: url('${fileReader.result}')`);
                    }
                    
                })

            </script>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                    </div>
                </div>
            </div>
@endsection

