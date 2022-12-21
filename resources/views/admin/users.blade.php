@extends('layout.index')

@section('acceso')
    <ul class="sidebar-menu">
        <li class="menu-header">Administrador</li>
        <li class="dropdown active">
            <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Inicio</span></a>
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
                <li><a href="salir">Login</a></li>
                <li><a href="{{ route('admin.users') }}">Ver usuarios</a></li>
                <li><a href="{{ route('registrar.formulario') }}">Agregar Usuario</a></li>
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

        <li class="menu-header">UI Elements</li>
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
                <li><a class="nav-link" href="#">Revisar analisis</a></li>
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
    <div class="container">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>Rut</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Profesion</th>
                    <th>Cargo</th>
                    <th>Estado</th>
                    <th>Email</th>
                    <th>Email Alternativo</th>
                    <th>Rol</th>
                    <th>Usuario que actualizo</th>
                    <th>Unidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->usua_rut}}</td>
                        <td>{{$usuario->usua_nombre}}</td>
                        <td>{{$usuario->usua_apellido}}</td>
                        <td>{{$usuario->usua_profesion}}</td>
                        <td>{{$usuario->usua_cargo}}</td>
                        <td>{{$usuario->usua_vigente}}</td>
                        <td>{{$usuario->usua_email}}</td>
                        <td>{{$usuario->usua_email_alternativo}}</td>
                        <td>{{$usuario->rous_codigo}}</td>
                        <td>{{$usuario->usua_usuario_mod}}</td>
                        <td>{{$usuario->unid_codigo}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
