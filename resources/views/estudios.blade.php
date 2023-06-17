@extends ('layout.base')
@section ('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2 class="text-white">Estudios</h2>
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$estudios->NumeroEstudio}}">
                        <img src="{{(base64_encode($estudios->Archivo))}}">
                    </button>
                </td>
                <td>{{$estudios->Interpretacion}}</td>
                <td><audio controls src="data:audio/mp3;base64,{{chunk_split(base64_encode($estudios->Audio))}}"></audio></td>
                <td><video controls src="data:audio/mp3;base64,{{chunk_split(base64_encode($estudios->Audio))}}"></video></td>
                <td>    
                <form action="{{ route('estudios.destroy',$estudios->NumeroEstudio) }}" method="Post">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarModal{{$estudios->NumeroEstudio}}">Editar</button>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>

            </tr>
            <div class="modal fade" id="staticBackdrop{{$estudios->NumeroEstudio}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog"></div>
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="data:image/png;base64,{{chunk_split(base64_encode($estudios->Archivo))}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editarModal{{$estudios->NumeroEstudio}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('estudios.update',$estudios->NumeroEstudio) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>ID:</strong>
                        <input type="text" name="NumeroEstudio" value="{{ $estudios->NumeroEstudio }}" class="form-control"
                            placeholder="ID">
                        @error('NumeroEstudio')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="NombreEstudio" class="form-control" placeholder="Nombre"
                            value="{{ $estudios->NombreEstudio }}">
                        @error('NombreEstudio')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Direccion:</strong>
                        <input type="text" name="IDPaciente" value="{{ $estudios->IDPaciente }}" class="form-control"
                            placeholder="Direccion">
                        @error('Direccion')
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
                            <input type="text" value = "{{$estudios->Archivo}}" name="FotoUpdate" id = "FotoUpdate" class="moleConPollo" placeholder="Archivo">
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

    <div class="modal fade" id="crearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('estudios.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Estudio:</strong>
                                        <input type="text" name="NombreEstudio" class="form-control" placeholder="Tipo de estudio">
                                        @error('NombreEstudio')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>ID Paciente:</strong>
                                        <input type="text" name="IDPaciente" class="form-control" placeholder="Paciente #">
                                        @error('IDPaciente')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Archivo:</strong>
                                        <input type="file" name="FotoInput" id="FotoInput" class="form-control" placeholder="Archivo">
                                        @error('FotoInput')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Foto:</strong>
                            <input type="text" value = "" name="Archivo" id = "Foto" class="mole" placeholder="Archivo">
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
            
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Interpretacion: </strong>
                                        <input type="text" name="Interpretacion" class="form-control" placeholder="Interpretacion">
                                        @error('Interpretacion')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Audio:</strong>
                                        <input type="file" name="Audio" class="form-control" placeholder="Audio">
                                        @error('Audio')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Video:</strong>
                                        <input type="file" name="Video" class="form-control" placeholder="Video">
                                        @error('Video')
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

</div>
@endsection