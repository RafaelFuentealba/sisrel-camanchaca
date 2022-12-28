@extends('layout.index')


@section('acceso')
    <ul class="sidebar-menu">
        <li class="menu-header">Administrador</li>
        <li class="dropdown active">
            <a href="{{ route('digitador.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Inicio</span></a>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Iniciativas</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('digitador.listar.iniciativas')}}">Iniciativas creadas</a></li>
                <li><a class="nav-link" href="#">Crear nueva iniciativa</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Extracción de
                    datos
                </span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="#">Ingresar Encuesta</a></li>
                <li><a class="nav-link" href="#">Revisar Encuesta </a></li>
            </ul>
        </li>
    </ul>
    </aside>
    </div>
@endsection
