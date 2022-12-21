@extends('layout.index')

@section('acceso')

<ul class="sidebar-menu">
    <li class="menu-header">Observador</li>
    <li class="dropdown active">
        <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Inicio</span></a>
    </li>
    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Iniciativas</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="#">iniciativas creadas</a></li>
        </ul>
    </li>
    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span>Usuarios</span></a>
        <ul class="dropdown-menu">
            <li><a href="/">Login</a></li>
            <li><a href="#">Olvidaste tu contraseña ?</a></li>
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
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="pie-chart"></i><span>Analisis de datos</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="#">Revisar analisis</a></li>
        </ul>
    </li>


    <li class="dropdown">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Extracción de datos
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


<h1>
    Usted Solo tiene acceso limitado

</h1>


@endsection