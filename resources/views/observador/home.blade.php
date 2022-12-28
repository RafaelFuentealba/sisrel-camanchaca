@extends('layout.index')

@section('acceso')
    <ul class="sidebar-menu">
        <li class="menu-header">Observador</li>
        <li class="dropdown active">
            <a href="#" class="nav-link"><i data-feather="monitor"></i><span>Inicio</span></a>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Iniciativas</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="#">iniciativas creadas</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="user-check"></i><span>Usuarios</span></a>
            <ul class="dropdown-menu">
                <li><a href="#">Olvidaste tu contraseña ?</a></li>
            </ul>
        </li>
        <li class="dropdown">


        <li class="menu-header">Analisis de datos</li>

        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="pie-chart"></i><span>Analisis de
                    datos</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('observador.graficos')}}">Revisar analisis</a></li>
            </ul>
        </li>


        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Extracción de
                    datos
                </span></a>
            <ul class="dropdown-menu">
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


<div>
    <h1>
        Usted a sido seleccionado para la grieta del invocador
    </h1>
    <p>Por lo cual no tiene permisos de edición le recomendamos ser un mejor flamer</p>
</div>


@endsection
