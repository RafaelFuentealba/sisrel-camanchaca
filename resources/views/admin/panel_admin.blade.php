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
                <li><a class="nav-link" href="#">Iniciativas creadas</a></li>
                <li><a class="nav-link" href="{{ route('admin.crear.iniciativa') }}">Crear nueva iniciativa</a></li>
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
        <li><a class="nav-link" href="{{route('admin.map')}}"><i data-feather="map-pin"></i><span> Ver mapa</span></a></li>

        </li>
    </ul>
    </aside>
    </div>
@endsection

@section('contenido')