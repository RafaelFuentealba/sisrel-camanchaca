<!doctype html>
<html lang="en">

<head>
    <title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
                        <div class="img" style="background-image: url(img/camanchaca.png); width:350px;">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                            </div>
                            <form action="#" class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Ingrese su nombre</label>
                                    <input type="text" class="form-control" placeholder="Ingrese su nombre" required title="Juan " / name="nombre" id="nombre">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="name">Ingrese su apellido</label>
                                    <input type="text" class="form-control" placeholder="Ingrese su apellido" required title=" perez" / name="apellido" id="apellido">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="name">Ingrese su correo</label>
                                    <input type="email" class="form-control" placeholder="Ingrese su correo" required title="example@gmail.com" / name="email" id="email">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="name">Ingrese un correo alternativo </label>
                                    <input type="email" class="form-control" placeholder="Ingrese su correo" title="example@gmail.com" / name="email_alt" id="email_alt">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="name">Ingrese su run</label>
                                    <input type="text" class="form-control" placeholder="Ingrese su rut sin puntos ni guión" required pattern="\d{3,8}-[\d|kK]{1}" title="Debe ser un Rut válido" / name="run" id="run">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" required id="clave" name="clave">
                                </div>

                                <div>
                                    <label for="Frecuencia">Cargo del responsable:</label>
                                    <select class="formbold-form-input" name="cargo" id="cargo" required>
                                        <option value="1">Jefe de planta</option>
                                        <option value="2">Encargado de zona</option>
                                        <option value="3">Administtrador</option>
                                        <option value="4">Recursos humanos</option>
                                        <option value="5">Trabajador de planta</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="label" for="name">Ingrese su profesión </label>
                                    <input type="text" class="form-control" placeholder="Ingrese su profesion"  name="profesion" id="profesion">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
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
    <!-- <script src="js/popper.js"></script> -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script src="js/main.js"></script>

</body>

</html>