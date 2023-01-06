<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Registro Superadministrador SISREL</title>
    <link rel="stylesheet" href="{{ asset('public/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/bundles/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('public/img/favicon.ico') }}' />
</head>

<body class="light light-sidebar theme-white sidebar-gone">
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Registro</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('auth.registrar') }}" method="POST">
                                    @csrf

                                    @if(Session::has('errorRegistro'))
                                    <div class="alert alert-danger alert-dismissible show fade">
                                        <div class="alert-body">
                                            <strong>{{ Session::get('errorRegistro') }}</strong>
                                            <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" autocomplete="off" require>
                                            @if($errors->has('nombre'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('nombre') }}</strong>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="apellido">Apellido</label>
                                            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}" autocomplete="off" require>
                                            @if($errors->has('apellido'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('apellido') }}</strong>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="run">RUN</label>
                                            <input type="text" class="form-control" placeholder="Ejemplo: 12345678-K" id="run" name="run" value="{{ old('run') }}" autocomplete="off" require>
                                            @if($errors->has('run'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('run') }}</strong>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="email">Correo electrónico</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" autocomplete="off" require>
                                            @if($errors->has('email'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="email">Correo electrónico alternativo</label>
                                            <input type="email" class="form-control" id="email_alt" name="email_alt" value="{{ old('email') }}" autocomplete="off">
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="Frecuencia">Cargo del responsable:</label>
                                            <select class="form-control" name="cargo" id="cargo">
                                                <option value="Jefe de planta">Jefe de planta</option>
                                                <option value="Encargado de zona">Encargado de zona</option>
                                                <option value="Administtrador">Administtrador</option>
                                                <option value="Recursos humanos">Recursos humanos</option>
                                                <option value="Trabajador de planta">Trabajador de planta</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="Profesion">Ingrese su profesión:</label>
                                            <input type="text" name="profesion" placeholder="ingeniero o algun otro" id="profesion" class="form-control" />
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="label" for="clave">Rol de acceso</label>
                                            <div class="form-group">
                                                <select class="form-control" id="rol" name="rol">
                                                    @foreach ($roles as $rol)
                                                    <option value="{{ $rol->rous_codigo }}">{{ $rol->rous_nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->has('rol'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('rol') }}</strong>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="clave" class="d-block">Contraseña</label>
                                            <input type="password" class="form-control" id="clave" name="clave" value="{{ old('clave') }}" autocomplete="off">
                                            @if($errors->has('clave'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('clave') }}</strong>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="confirmarclave" class="d-block">Confirmar contraseña</label>
                                            <input type="password" class="form-control" id="confirmarclave" name="confirmarclave" autocomplete="off">
                                            @if($errors->has('confirmarclave'))
                                            <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                                    <strong>{{ $errors->first('confirmarclave') }}</strong>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Registrar
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-4 text-muted text-center">¿Ya estás registrado?<a href="{{ route('auth.ingresar') }}"> Ingresar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('public/js/app.min.js') }}"></script>
    <script src="{{ asset('public/bundles/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('public/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('public/js/page/auth-register.js') }}"></script>
    <script src="{{ asset('public/js/scripts.js') }}"></script>
    <script src="{{ asset('public/js/custom.js') }}"></script>
</body>

</html>