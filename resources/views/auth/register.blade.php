<!doctype html>
<html lang="es">

<head>
  <title>Crear Cuenta | Medical Center BDA</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/login.css') }}">

</head>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Por las chancas de mi madre!</strong> Algo fue mal..<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="{{ asset('resources/hospitalLogo.jpg') }}"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">FORMULARIO DE REGISTRO</p>
          </div>

        <form action="{{ route('register') }}" method="post">
            @csrf
          <!-- Email input -->

          <div class="form-outline mb-4">
            <input type="text" name="name" class="form-control form-control-lg"
              placeholder="Nombre Completo" />
          </div>

          <div class="form-outline mb-4">
            <input type="email" name="email" class="form-control form-control-lg"
              placeholder="Correo Electrónico" />
          </div>

          <div class="form-outline mb-3">
            <input type="password" name="password" class="form-control form-control-lg"
              placeholder="Contraseña" />
          </div>

          <div class="form-outline mb-3">
            <input type="password" name="password confirmation" class="form-control form-control-lg"
              placeholder="Confirmar contraseña" />
          </div>

          <div class="form-outline mb-3">
            <div class="mb-3">
              <label for="" class="form-label">Elije un rol:</label>
              <select multiple class="form-select form-select-lg" name="rol" id="">
                    <option selected>Select one</option>
                    <option value="medico">Médico</option>
                    <option value="paciente">Paciente</option>
                </select>
            </div>
          </div>

          <div class="d-flex justify-content-between align-items-center">
          </div>
        

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Registrarse</button>
          </div>

        
        <p class="small fw-bold mt-2 pt-1 mb-0"> <a href="{{ route('login') }}"
                class="link-danger">Volver</a></p>  
                </form>
    </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Proyecto Final: Bases de Datos Avanzadas (2023-2) Equipo 3
    </div>

  </div>
</section>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>