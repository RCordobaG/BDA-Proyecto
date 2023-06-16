<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Company Form - Laravel 9 CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Crear Estudio</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="/estudios"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('crearEstudio.store') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="file" name="Archivo" class="form-control" placeholder="Archivo">
                        @error('Archivo')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
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
    <?php
    $path = 'resources/guille.png';
    $type = pathinfo($path,PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64=base64_decode($data);
    echo($base64);
    ?>
</body>

</html>