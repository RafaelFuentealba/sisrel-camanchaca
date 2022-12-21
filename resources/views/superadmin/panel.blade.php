<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Panel Superadministrador SISREL</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('public/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('public/img/camanchaca.png') }}' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                        <li>
                            <form class="form-inline mr-auto">
                                <div class="search-element">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                                        data-width="200">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                            <span class="badge headerBadge1">
                                6 </span> </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Messages
                                <div class="float-right">
                                    <a href="javascript:void(0)">Mark All As Read</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Notifications
                                <div class="float-right">
                                    <a href="javascript:void(0)">Mark All As Read</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                src="{{ asset('public/img/user.png') }}" class="user-img-radious-style"> <span
                                class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">
                                @if(Session::has('superadmin'))
                                    Hola {{ Session::get('superadmin.usua_nombre') }}
                                @else
                                    Hola Usuario
                                @endif
                            </div>
                            <a href="javascript:void(0)" class="dropdown-item has-icon">
                                <i class="far fa-user"></i>
                                @if (Session::has('superadmin'))
                                    Perfil
                                @endif
                            </a>
                            <a href="javascript:void(0)" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                                @if (Session::has('superadmin'))
                                    Configuraciones
                                @endif
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('auth.cerrar') }}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i>
                                Cerrar sesión
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html"> <img alt="image" src="{{ asset('public/img/camanchaca.png') }}" class="header-logo" /> <span class="logo-name">SISREL</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">PRINCIPAL</li>
                        <li class="{{ Route::is('superadmin.index') ? 'dropdown active' : 'dropdown' }}">
                            <a href="{{ route('superadmin.index') }}" class="nav-link"><i data-feather="monitor"></i><span>Inicio</span></a>
                        </li>
                        <li class="{{ Route::is('superadmin.gestionar.usuarios') ? 'dropdown active' : 'dropdown' }}">
                            <a href="{{ route('superadmin.gestionar.usuarios') }}" class="nav-link"><i data-feather="user-check"></i><span>Usuarios</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                    data-feather="grid"></i><span>Parámetros</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="javascript:void(0)">Unidades</a></li>
                                <li><a class="nav-link" href="javascript:void(0)">Otro</a></li>
                                <li><a class="nav-link" href="djavascript:void(0)">Otro</a></li>
                            </ul>
                        </li>
                    </ul>
                </aside>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                @yield('contenido-principal')
            </div>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('public/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <!--<script src="{{ asset('public/bundles/apexcharts/apexcharts.min.js') }}"></script>-->
    <!-- Page Specific JS File -->
    <!--<script src="{{ asset('public/js/page/index.js') }}"></script>-->
    <!-- Template JS File -->
    <script src="{{ asset('public/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('public/js/custom.js') }}"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
