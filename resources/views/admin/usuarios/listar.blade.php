@extends('layout.index')

@section('acceso')
    <ul class="sidebar-menu">
        <li class="menu-header">Administrador</li>
        <li class="dropdown active">
            <a href="{{ route('admin.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Inicio</span></a>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Iniciativas</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="#">iniciativas creadas</a></li>
                <li><a class="nav-link" href="#">Crear nueva iniciativa</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="user-check"></i><span>Usuarios</span></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('admin.users') }}">Ver usuarios</a></li>
                <li><a href="#">Olvidaste tu contraseña ?</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="command"></i><span>Parametros</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="#">Unidades institucionales</a></li>
                <li><a class="nav-link" href="#">Sedes</a></li>
                <li><a class="nav-link" href="#">Lineas de acción</a></li>
                <li><a class="nav-link" href="#">Convenios</a></li>
            </ul>
        </li>

        <li class="menu-header">Analisis de datos</li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Objetivos
                </span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="alert.html">Objs. de desarrollo sostenible</a></li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="pie-chart"></i><span>Analisis de
                    datos</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="#">Añadir analisis </a></li>
                <li><a class="nav-link" href="#">Modificar analisis </a></li>
                <li><a class="nav-link" href="{{route('admin.graficos')}}">Revisar analisis</a></li>
            </ul>
        </li>


        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Extracción de
                    datos
                </span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="#">Ingresar Encuesta</a></li>
                <li><a class="nav-link" href="#">Modificar Encuesta </a></li>
                <li><a class="nav-link" href="#">Revisar Encuesta </a></li>
            </ul>
        </li>

        <li class="menu-header">Maps</li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="map"></i><span>Mapa de las plantas
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
    <div class="card">
        <div class="card-header">
            <h4>Listado de usuarios</h4>
            <div class="card-header-action">
                <a href="{{ route('registrar.formulario') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo
                    Usuario</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Cargo</th>
                            <th>Profesión</th>
                            <th>Email</th>
                            <th>Vigencia</th>
                            <th>Rol</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </tr>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->usua_rut }}</td>
                                <td>{{ $usuario->usua_nombre }} {{ $usuario->usua_apellido }}</td>
                                <td>{{ $usuario->usua_cargo }}</td>
                                <td>{{ $usuario->usua_profesion }}</td>
                                <td>{{ $usuario->usua_email }}</td>
                                <th>
                                    @if ($usuario->usua_vigente == 'S')
                                        <p class="badge badge-success"><strong>Activo</strong></p>
                                    @else
                                        <p class="badge badge-danger"><strong>Inactivo</strong></p>
                                    @endif
                                </th>
                                <th>
                                    @if ($usuario->rous_codigo == 1)
                                        <p class="badge badge-warning"><strong>Administrador</strong></p>
                                    @elseif ($usuario->rous_codigo == 2)
                                        <p class="badge badge-info"><strong>Digitador</strong></p>
                                    @elseif ($usuario->rous_codigo == 3)
                                        <p class="badge badge-primary"><strong>Observador</strong></p>
                                    @endif
                                </th>
                                <td>
                                    <a href="{{ route('admin.editar', $usuario->usua_rut) }}" class="btn btn-info"><i
                                            class="fa fa-edit"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('admin.borrar', $usuario->usua_rut) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
