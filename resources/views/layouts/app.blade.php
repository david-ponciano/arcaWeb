<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ArcaWeb</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="dist/js/adminlte.js"></script>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Right navbar links -->
                
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ url('/') }}" class="brand-link">
                    <img src="{{asset('dist/img/icono.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">ArcaWeb</span>
                </a>
        
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{asset('dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">
                                @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                @else
                                {{ Auth::user()->name }}
                                <a type="button" class=" btn btn-secondary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                @endguest
                            </a>
                        </div>
                    </div>
                   
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">

                            <li class="nav-item">
                                <a href="/" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Inicio</p>
                                </a>
                            </li>
                             
                            <li class="nav-item">
                                <a href="{{url('usuarios')}}"
                                    class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Usuarios
                                        <?php $users_count = DB::table('users')->count() ?>
                                        <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>
                                    </p>
                                </a>
                            </li>
                            

                            <li class="nav-item">
                                <a href="{{url('roles')}}"
                                    class="{{ Request::path() === 'roles' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="fas fa-users-cog nav-icon"></i>
                                    <p>
                                        Roles
                                        </span>
                                    </p>
                                </a>
                            </li>
                           

                           
                            <li class="nav-item">
                                <a href="{{url('mascotas')}}"
                                    class="{{ Request::path() === 'mascotas' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-paw"></i>
                                    <p>
                                        Mascotas
                                        
                                    </p>
                                </a>
                            </li>

                             @can('Administrador')
                            <li class="nav-item has-treeview">
                                <a href="" class="nav-link">
                                    <i class="fas fa-list-alt nav-icon"></i>
                                    <p>Datos<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                   
                                    <li class="nav-item">
                                        <a href="{{url('especies')}}"
                                            class="{{ Request::path() === 'especies' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="fas fa-kiwi-bird nav-icon"></i>
                                            <p>Especies</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('razas')}}"
                                            class="{{ Request::path() === 'razas' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="fas fa-cat nav-icon"></i>
                                            <p>Razas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('sexos')}}"
                                            class="{{ Request::path() === 'sexos' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="fas fa-venus-mars nav-icon"></i>
                                            <p>Sexos</p>
                                        </a>
                                    </li>
                                </ul>
                               
                            @endcan

                            </li>
                             <li class="nav-item">
                                <a href="{{url('historiales')}}"
                                    class="{{ Request::path() === 'historiales' ? 'nav-link active' : 'nav-link' }}">
                                    <i class=" nav-icon far fa-clipboard"></i>           
                                    <p>
                                        Historial
                                        
                                    </p>
                                </a>
                                </li>
                            <li class="nav-item has-treeview">
                                <a href="" class="nav-link">
                                    <i class="fas fa-hospital nav-icon"></i>
                                    <p>Clínica<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                   
                                    <li class="nav-item">
                                        <a href="{{url('servicios')}}"
                                            class="{{ Request::path() === 'servicios' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="fas fa-stethoscope nav-icon"></i>
                                            <p>Servicios</p>
                                        </a>
                                    </li>
                                     @can('Administrador')
                                    <li class="nav-item">
                                        <a href="{{url('estados')}}"
                                            class="{{ Request::path() === 'estados' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="fas fa-stream nav-icon"></i>
                                            <p>Est. Reproducción</p>
                                        </a>
                                    </li>
                                    @endcan

                                </ul>
                             </li>
                             <li class="nav-item">
                                <a href="{{url('citas')}}"
                                    class="{{ Request::path() === 'citas' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="far fa-calendar nav-icon"></i>          
                                    <p>
                                        Citas
                                        
                                    </p>
                                </a>
                                </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                    
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">

                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <!-- NO QUITAR -->
                <strong>Proyecto de graduación II - David Ponciano - 6590-15-233
                    <div class="float-right d-none d-sm-inline-block">
                        <b>ArcaWeb</b> 2.0
                    </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
    </div>
</body>

</html>
