@extends('layout.index')

@section('acceso')

<ul class="sidebar-menu">
    <li class="menu-header">Observador</li>
    <li class="dropdown active">
        <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Inicio</span></a>
    </li>
    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Iniciativas</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="#">iniciativas creadas</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Usuarios</span></a>
        <ul class="dropdown-menu">
            <li><a href="/">Login</a></li>
            <li><a href="#">Olvidaste tu contraseña ?</a></li>
        </ul>
    </li>


    <li class="menu-header">Analisis de datos</li>
    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Objetivos
            </span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="#">Objs. de desarrollo sostenible</a></li>
        </ul>
    </li>

    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Analisis de datos</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="#">Revisar analisis</a></li>
        </ul>
    </li>


    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Extracción de datos
            </span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="#">Revisar Encuesta </a></li>
        </ul>
    </li>

    <li class="menu-header">Maps</li>
    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="grid"></i><span>Mapa de las plantas
            </span></a>
        <ul class="dropdown-menu">
            <li><a href="#">Bitacora</a></li>
        </ul>
    </li>
    <li><a class="nav-link" href="#"><i data-feather="map-pin"></i><span>Vector
                Map</span></a></li>

    </li>
</ul>
</aside>
</div>







@endsection




@section('contenido')


<div>
    <div class="card">
        <div class="card-header">
            <h4>Iniciativas Creadas</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th class="text-center">
                                Numero
                            </th>
                            <th>Nombre de la iniciativa</th>
                            <th>Progreso</th>
                            <th>Participantes</th>
                            <th>Fecha de Inicio</th>
                            <th>Estado</th>
                            <th>Información</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>Añadir encuentas de clima</td>
                            <td class="align-middle">
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-success width-per-70">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <img alt="image" src="{{ asset('public/assets/img/users/user-1.png') }}" width="35">
                            </td>
                            <td>2018-01-20</td>
                            <td>
                                <div class="badge badge-warning badge-shadow">Vigente</div>
                            </td>
                            <td><a href="#" class="btn btn-primary">Detail</a></td>
                        </tr>
                        <tr>
                            <td>
                                2
                            </td>
                            <td>Registrar usuarios</td>
                            <td class="align-middle">
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-success width-per-95"></div>
                                </div>
                            </td>
                            <td>
                                <img alt="image" src="{{ asset('public/assets/img/users/user-1.png') }}" width="35">
                            </td>
                            <td>2018-01-16</td>
                            <td>
                                <div class="badge badge-danger badge-shadow">NO Vigente</div>
                            </td>
                            <td><a href="#" class="btn btn-primary">Detail</a></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
