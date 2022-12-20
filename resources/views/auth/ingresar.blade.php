<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesion</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/estilos.css">

</head>

<body style="background: url(img/mar.jpg); background-size:cover; background-repeat:no-repeat;">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <img class="img" src="img/logo_texto.png"></img>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(img/camanchaca.png);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">INICIAR SESSION</h3>
                                </div>
                            </div>
                            <form action="{{route('auth.ingresar')}}" class="signin-form" method="POST">
                                @csrf

                                @if (Session::has('errorRut'))
                                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                        <strong>{{ Session::get('errorRut') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Cerrar"></button>
                                    </div>
                                @endif

                                @if (Session::has('errorClave'))
                                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                        <strong>{{ Session::get('errorClave') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Cerrar"></button>
                                    </div>
                                @endif

                                @if (Session::has('sessionFinalizada'))
                                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                        <strong>{{ Session::get('sessionFinalizada') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Cerrar"></button>
                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label class="label" for="run">Run</label>
                                    <input type="text" class="form-control"
                                        placeholder="Ingrese su rut sin puntos y con guión"
                                        required pattern="\d{3,8}-[\d|kK]{1}" title="Debe ser un Rut válido"
                                        name="run" id="run" />
                                </div>

                                @if ($errors->has('run'))
                                    <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                                        <strong>{{ $errors->first('run') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Cerrar"></button>
                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label class="label" for="clave">Contraseña</label>
                                    <input type="password" class="form-control" placeholder="Ingrese su contraseña" required
                                        id="clave" name="clave">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                        In</button>
                                </div>
                                @if ($errors->has('clave'))
                                    <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                                        <strong>{{ $errors->first('clave') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Cerrar"></button>
                                    </div>
                                @endif
                                {{-- <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
                                </div>
                                 --}}
                                 <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="{{ route('registrar.formulario') }}">¿No tienes una cuenta?</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
