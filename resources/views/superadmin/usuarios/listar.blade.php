@extends('superadmin.panel')

@section('contenido-principal')

<section class="section">
    <div class="section-body">
        <div class="row">            
            <div class="col-12">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        @if(Session::has('errorRegistro'))
                            <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                <div class="alert-body">
                                    <strong>{{ Session::get('errorRegistro') }}</strong>
                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                </div>
                            </div>
                        @endif
                        @if(Session::has('usuarioRegistrado'))
                            <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                <div class="alert-body">
                                    <strong>{{ Session::get('usuarioRegistrado') }}</strong>
                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-3"></div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h4>Listado de usuarios administradores</h4>
                        <div class="card-header-action">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNuevoAdministrador"><i class="fas fa-plus"></i> Nuevo administrador</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Nombre</th>
                                        <th>RUN</th>
                                        <th>Fecha creación</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>Create a mobile app</td>
                                        <td class="align-middle">
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-success width-per-40">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="assets/img/users/user-5.png" width="35">
                                        </td>
                                        <td>2018-01-20</td>
                                        <td>
                                            <div class="badge badge-success badge-shadow">Completed</div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>Redesign homepage</td>
                                        <td class="align-middle">
                                            <div class="progress progress-xs">
                                                <div class="progress-bar width-per-60"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="assets/img/users/user-1.png" width="35">
                                            <img alt="image" src="assets/img/users/user-3.png" width="35">
                                            <img alt="image" src="assets/img/users/user-4.png" width="35">
                                        </td>
                                        <td>2018-04-10</td>
                                        <td>
                                            <div class="badge badge-info badge-shadow">Todo</div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3
                                        </td>
                                        <td>Backup database</td>
                                        <td class="align-middle">
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-warning width-per-70"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="assets/img/users/user-1.png" width="35">
                                            <img alt="image" src="assets/img/users/user-2.png" width="35">
                                        </td>
                                        <td>2018-01-29</td>
                                        <td>
                                            <div class="badge badge-warning badge-shadow">In Progress</div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            4
                                        </td>
                                        <td>Input data</td>
                                        <td class="align-middle">
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-success width-per-90"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="assets/img/users/user-2.png" width="35">
                                            <img alt="image" src="assets/img/users/user-5.png" width="35">
                                            <img alt="image" src="assets/img/users/user-4.png" width="35">
                                            <img alt="image" src="assets/img/users/user-1.png" width="35">
                                        </td>
                                        <td>2018-01-16</td>
                                        <td>
                                            <div class="badge badge-success badge-shadow">Completed</div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            5
                                        </td>
                                        <td>Create a mobile app</td>
                                        <td class="align-middle">
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-success width-per-40">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="assets/img/users/user-5.png" width="35">
                                        </td>
                                        <td>2018-01-20</td>
                                        <td>
                                            <div class="badge badge-success badge-shadow">Completed</div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            6
                                        </td>
                                        <td>Redesign homepage</td>
                                        <td class="align-middle">
                                            <div class="progress progress-xs">
                                                <div class="progress-bar width-per-60"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="assets/img/users/user-1.png" width="35">
                                            <img alt="image" src="assets/img/users/user-3.png" width="35">
                                            <img alt="image" src="assets/img/users/user-4.png" width="35">
                                        </td>
                                        <td>2018-04-10</td>
                                        <td>
                                            <div class="badge badge-info badge-shadow">Todo</div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            7
                                        </td>
                                        <td>Backup database</td>
                                        <td class="align-middle">
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-warning width-per-70"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="assets/img/users/user-1.png" width="35">
                                            <img alt="image" src="assets/img/users/user-2.png" width="35">
                                        </td>
                                        <td>2018-01-29</td>
                                        <td>
                                            <div class="badge badge-warning badge-shadow">In Progress</div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            8
                                        </td>
                                        <td>Input data</td>
                                        <td class="align-middle">
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-success width-per-90"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="assets/img/users/user-2.png" width="35">
                                            <img alt="image" src="assets/img/users/user-5.png" width="35">
                                            <img alt="image" src="assets/img/users/user-4.png" width="35">
                                            <img alt="image" src="assets/img/users/user-1.png" width="35">
                                        </td>
                                        <td>2018-01-16</td>
                                        <td>
                                            <div class="badge badge-success badge-shadow">Completed</div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            9
                                        </td>
                                        <td>Create a mobile app</td>
                                        <td class="align-middle">
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-success width-per-40">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="assets/img/users/user-5.png" width="35">
                                        </td>
                                        <td>2018-01-20</td>
                                        <td>
                                            <div class="badge badge-success badge-shadow">Completed</div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            10
                                        </td>
                                        <td>Redesign homepage</td>
                                        <td class="align-middle">
                                            <div class="progress progress-xs">
                                                <div class="progress-bar width-per-60"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="assets/img/users/user-1.png" width="35">
                                            <img alt="image" src="assets/img/users/user-3.png" width="35">
                                            <img alt="image" src="assets/img/users/user-4.png" width="35">
                                        </td>
                                        <td>2018-04-10</td>
                                        <td>
                                            <div class="badge badge-info badge-shadow">Todo</div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            11
                                        </td>
                                        <td>Backup database</td>
                                        <td class="align-middle">
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-warning width-per-70"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="assets/img/users/user-1.png" width="35">
                                            <img alt="image" src="assets/img/users/user-2.png" width="35">
                                        </td>
                                        <td>2018-01-29</td>
                                        <td>
                                            <div class="badge badge-warning badge-shadow">In Progress</div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            12
                                        </td>
                                        <td>Input data</td>
                                        <td class="align-middle">
                                            <div class="progress progress-xs">
                                                <div class="progress-bar bg-success width-per-90"></div>
                                            </div>
                                        </td>
                                        <td>
                                            <img alt="image" src="assets/img/users/user-2.png" width="35">
                                            <img alt="image" src="assets/img/users/user-5.png" width="35">
                                            <img alt="image" src="assets/img/users/user-4.png" width="35">
                                            <img alt="image" src="assets/img/users/user-1.png" width="35">
                                        </td>
                                        <td>2018-01-16</td>
                                        <td>
                                            <div class="badge badge-success badge-shadow">Completed</div>
                                        </td>
                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vertically Center -->
<div class="modal fade" id="modalNuevoAdministrador" tabindex="-1" role="dialog" aria-labelledby="modalNuevoAdministradorTitulo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNuevoAdministradorTitulo">Nuevo administrador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('superadmin.registrar.admin') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label>Nombre</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Apellido</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>RUN</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-sort-numeric-down"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Ejemplo: 12345678-K" id="run" name="run" value="{{ old('run') }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Correo electrónico</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                            <i class="fas fa-lock"></i>
                            </div>
                        </div>
                            <input type="password" class="form-control" id="clave" name="clave" value="{{ old('clave') }}" autocomplete="off">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary waves-effect">Registrar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('public/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{ asset('public/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('public/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/js/page/datatables.js') }}"></script>

@endsection
