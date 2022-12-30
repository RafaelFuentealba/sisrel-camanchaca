    <!DOCTYPE html>
    <html lang="en">


    <!-- index.html  21 Nov 2019 03:44:50 GMT -->

    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>SISREL Camanchaca</title>
        <!-- General CSS Files -->
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/social.css') }}" rel="stylesheet">
        <!-- Template CSS -->
        <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/components.css') }}" rel="stylesheet">
        <!-- Custom style CSS -->
        <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">
        <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
            integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
        <link rel="stylesheet" href="{{ asset('public/css/mapa.css') }}" />
        {{-- <script src="{{asset('public/js/mapa.js')}}"></script> --}}
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
                            <li><a href="#" data-toggle="sidebar"
                                    class="nav-link nav-link-lg
                                        collapse-btn">
                                    <i data-feather="align-justify"></i></a></li>
                            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                    <i data-feather="maximize"></i>
                                </a></li>
                            <li>
                                <form class="form-inline mr-auto">
                                    <div class="search-element">
                                        <input class="form-control" type="search" placeholder="Search"
                                            aria-label="Search" data-width="200">
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
                                        <a href="#">Mark All As Read</a>
                                    </div>
                                </div>
                        </li>
                        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                class="nav-link notification-toggle nav-link-lg"><i data-feather="bell"
                                    class="bell"></i>
                            </a>
                            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                                <div class="dropdown-header">
                                    Notifications
                                    <div class="float-right">
                                        <a href="javascript:void(0)">Mark All As Read</a>
                                    </div>
                        </li>
                        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                    src="{{ asset('public/assets/img/user.png') }}" class="user-img-radious-style">
                                <span class="d-sm-none d-lg-inline-block"></span></a>
                            <div class="dropdown-menu dropdown-menu-right pullDown">
                                <div class="dropdown-title">
                                    @if (Session::has('admin'))
                                        Hola {{ Session::get('admin.usua_nombre') }}
                                    @elseif (Session::has('admin'))
                                        Hola {{ Session::get('digitador.usua_nombre') }}
                                    @elseif(Session::has('admin'))
                                        Hola {{ Session::get('observador.usua_nombre') }}
                                    @endif

                                </div>
                                <a href="profile.html" class="dropdown-item has-icon"> <i
                                        class="far
                                            fa-user"></i> Perfil
                                </a> <a href="timeline.html" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i>
                                    Activities
                                </a> <a href="#" class="dropdown-item has-icon"> <i class="fas fa-cog"></i>
                                    Configuraciones
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('auth.cerrar') }}" class="dropdown-item has-icon text-danger"> <i
                                        class="fas fa-sign-out-alt"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="main-sidebar sidebar-style-2">
                    <aside id="sidebar-wrapper">
                        <div class="sidebar-brand">
                            <a href="index.html"> <img alt="image" src="{{ asset('public/img/camanchaca.png') }}"
                                    class="header-logo" /> <span class="logo-name">SISREL</span>
                            </a>
                        </div>



                        <!-- barra lateral izquierda  -->
                        @yield('acceso')



                        <!-- Main Content -->
                        <div class="main-content">
                            @yield('contenido')
                        </div>



                </div>
            </div>
        </div>
        </div>

        <!-- General JS Scripts -->
        <script src="{{ asset('public/js/app.min.js') }}"></script>
        <!-- JS Libraies -->
        <script src="{{ asset('public/js/chart.min.js') }}"></script>
        <!-- Page Specific JS File -->
        <script src="{{ asset('public//js/chart-chartjs.js') }}"></script>
        <!-- Template JS File -->
        <script src="{{ asset('public/js/scripts.js') }}"></script>
        <!-- Custom JS File -->
        <script src="{{ asset('public/js/custom.js') }}"></script>
        <script src="{{ asset('public/js/index.js') }}"></script>
        {{-- <!-- General JS Scripts -->
            <script src="{{ asset('public/js/app.min.js') }}"></script>
            <!-- JS Libraies -->
            <script src="{{ asset('public/js/apex.min.js') }}"></script>
            <!-- Page Specific JS File -->
            <script src="{{ asset('public/js/index.js') }}"></script>
            <!-- Template JS File -->
            <script src="{{ asset('public/js/scripts.js') }}"></script>
            <!-- Custom JS File -->
            <script src="{{ asset('public/js/custom.js') }}"></script> --}}
    </body>


    <!-- index.html  21 Nov 2019 03:47:04 GMT -->

    </html>
