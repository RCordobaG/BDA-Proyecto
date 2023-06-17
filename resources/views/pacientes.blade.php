<meta charset="UTF-8">
@extends ('layout.base')
@section ('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Pacientes</h2>
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
                <th>ID</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>email</th>
                <th>Medico Tratante</th>
                <th>Acciones</th>
            </tr>
            @foreach($pacientes as $pacientes)
            <tr>
                <td class="fw-bold">{{$pacientes->ID}}</td>
                <td><img src="{{($pacientes->Foto)}}"/></td>
                <td class="fw-bold">{{$pacientes->Nombre}}</td>
                <td class="fw-bold">{{$pacientes->Direccion}}</td>
                <td class="fw-bold">{{$pacientes->Telefono}}</td>
                <td class="fw-bold">{{$pacientes->email}}</td>
                <td class="fw-bold">{{$pacientes->MedicoTratante}}</td>
                <td>
                    <form action="{{ route('pacientes.destroy',$pacientes->ID) }}" method="Post">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarModal{{$pacientes->ID}}">
                        Crear tarea
                    </button>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <div class="modal fade" id="editarModal{{$pacientes->ID}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('pacientes.update',$pacientes->ID) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>ID:</strong>
                        <input type="text" name="ID" value="{{ $pacientes->ID }}" class="form-control"
                            placeholder="ID">
                        @error('ID')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="Nombre" class="form-control" placeholder="Nombre"
                            value="{{ $pacientes->Nombre }}">
                        @error('Nombre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Direccion:</strong>
                        <input type="text" name="Direccion" value="{{ $pacientes->Direccion }}" class="form-control"
                            placeholder="Direccion">
                        @error('Direccion')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Telefono:</strong>
                        <input type="text" name="Telefono" value="{{ $pacientes->Telefono }}" class="form-control"
                            placeholder="Telefono">
                        @error('Telefono')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>email:</strong>
                        <input type="email" name="email" value="{{ $pacientes->email }}" class="form-control"
                            placeholder="email">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Archivo:</strong>
                        <input type="text" name="MedicoTratante" value="{{ $pacientes->MedicoTratante }}" class="form-control"
                            placeholder="Matricula Medico">
                        @error('MedicoTratante')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Foto:</strong>
                            <input type="file" name="FotoInputUpdate" id = "FotoInputUpdate" src = "" class="form-control" placeholder="Archivo">
                            @error('FotoInput')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Foto:</strong>
                            <input type="text" value = "{{$pacientes->Foto}}" name="FotoUpdate" id = "FotoUpdate" class="moleConPollo" placeholder="Archivo">
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
                    <form action="{{ route('pacientes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <h3>Matricula:</h3>
                        <input type="text" name="ID" class="form-control" placeholder="# Matricula">
                        @error('ID')
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
                        <strong>Direccion:</strong>
                        <input type="text" name="Direccion" class="form-control" placeholder="Direccion">
                        @error('Direccion')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Telefono:</strong>
                        <input type="text" name="Telefono" class="form-control" placeholder="Telefono">
                        @error('Telefono')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="email">
                        @error('email')
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

