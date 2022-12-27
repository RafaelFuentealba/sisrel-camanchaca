<!doctype html>
<html lang="en">

<head>
    <title>Registro de usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('public/css/estilos.css') }}">
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
</head>

<body style="background: url({{ asset('public/img/mar.jpg') }}); background-size:cover; background-repeat:no-repeat;">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <img class="img" src="{{ asset('public/img/logo_texto.png') }}"></img>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img"
                            style="background-image: url({{ asset('public/img/camanchaca.png') }}); width:350px;">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                            </div>
                            <form action="{{ route('admin.update', $usuario->usua_rut) }}" class="signin-form"
                                method="POST">
                                @method('PUT')
                                @csrf

                                @if ($errors->has('nombre'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2 mb-2"
                                        role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>

                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Ingrese su nombre</label>
                                    <input type="text" class="form-control" placeholder="Ingrese su nombre" required
                                        / name="nombre" id="nombre" value="{{ $usuario->usua_nombre }}">
                                </div>

                                @if ($errors->has('apellido'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2 mb-2"
                                        role="alert">
                                        <strong>{{ $errors->first('apellido') }}</strong>

                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Ingrese su apellido</label>
                                    <input type="text" class="form-control" placeholder="Ingrese su apellido"
                                        required / name="apellido" id="apellido" value="{{ $usuario->usua_apellido }}">
                                </div>

                                @if ($errors->has('email'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2 mb-2"
                                        role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>

                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Ingrese su correo</label>
                                    <input type="email" class="form-control" placeholder="example@gmail.com" required
                                        / name="email" id="email" value="{{ $usuario->usua_email }}">
                                </div>

                                @if ($errors->has('email_alt'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2 mb-2"
                                        role="alert">
                                        <strong>{{ $errors->first('email_alt') }}</strong>

                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Ingrese un correo alternativo </label>
                                    <input type="email" class="form-control" placeholder="Ingrese un correo"
                                        title="Este campo es opcional" / name="email_alt" id="email_alt"
                                        value="{{ $usuario->usua_email_alternativo }}">
                                </div>

                                @if ($errors->has('run'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2 mb-2"
                                        role="alert">
                                        <strong>{{ $errors->first('run') }}</strong>

                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Ingrese un run</label>
                                    <input type="text" class="form-control" placeholder="123454678-K" required
                                        pattern="\d{3,8}-[\d|K]{1}" title="Debe ser un Rut válido" / name="run"
                                        id="run" value="{{ $usuario->usua_rut }}">
                                </div>

                                @if ($errors->has('clave'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2 mb-2"
                                        role="alert">
                                        <strong>{{ $errors->first('clave') }}</strong>

                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label class="label" for="clave">Contraseña</label>
                                    <input type="password" class="form-control" placeholder="Password" required
                                        id="clave" name="clave">
                                </div>

                                @if ($errors->has('cargo'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2 mb-2"
                                        role="alert">
                                        <strong>{{ $errors->first('cargo') }}</strong>

                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label for="cargo" class="label">Cargo del responsable:</label>
                                    <select class="formbold-form-input" name="cargo" id="cargo" required>
                                        <option value="{{ $usuario->usua_cargo }}">{{ $usuario->usua_cargo }}
                                        </option>
                                        <option value="Jefe de planta">Jefe de planta</option>
                                        <option value="Encargado de zona">Encargado de zona</option>
                                        <option value="Administración">Administración</option>
                                        <option value="Recursos humanos">Recursos humanos</option>
                                        <option value="Trabajador de planta">Trabajador de planta</option>
                                    </select>
                                </div>

                                @if ($errors->has('rol'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2 mb-2"
                                        role="alert">
                                        <strong>{{ $errors->first('rol') }}</strong>

                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label class="label" for="rol">Asigne un rol al nuevo usuario </label>
                                    <select name="rol" id="rol" class="formbold-form-input">
                                        @foreach ($roles as $rol)
                                            <option value="{{ $rol->rous_codigo }}">{{ $rol->rous_nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @if ($errors->has('vigente'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2 mb-2"
                                        role="alert">
                                        <strong>{{ $errors->first('vigente') }}</strong>

                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label class="label" for="vigente">¿El usuario esta vigente?</label>
                                    <select name="vigente" id="vigente" class="formbold-form-input">
                                        <option value="S">SI</option>
                                        <option value="N">NO</option>
                                    </select>
                                </div>

                                @if ($errors->has('profesion'))
                                    <div class="alert alert-warning alert-dismissible fade show mt-2 mb-2"
                                        role="alert">
                                        <strong>{{ $errors->first('profesion') }}</strong>

                                    </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label class="label" for="profesion">Ingrese su profesión </label>
                                    <input type="text" class="form-control" placeholder="Ingrese su profesion"
                                        name="profesion" id="profesion" value="{{ $usuario->usua_profesion }}">
                                </div>

                                <div class="form-group">
                                    <button type="submit"
                                        class="form-control btn btn-primary rounded submit px-3">Actualizar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    <!-- <script src="js/popper.js"></script> -->
    <script src="{{ asset('public/js/main.js') }}"></script>

</body>

</html>
