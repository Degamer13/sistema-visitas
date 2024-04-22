<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema de Visitas</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('css2/admin.css') }}">
        <script src="{{ asset('js2/admin.js') }}"></script>
     <link rel="stylesheet" href="{{ asset('assets/demo/') }}"> <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
      

        <link rel="stylesheet" href="{{ asset('css2/select2.min.css') }}">
       
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Sistema de Visitas</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="hidden" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />

                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> {{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">


                        <li>   <a class="dropdown-item"  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav" >
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" >
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link"  href="{{ url('/home') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                              Inicio
                            </a>
                            @can('user-list')


                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                               Usuarios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            @endcan
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                 <li>
                                    @can('user-create')


                                    <a class="dropdown-item" href="{{ route('users.create') }}">Registrar Usuario</a></li>
                                    @endcan<li>

                                       @can('user-list')

                                       <a class="dropdown-item" href="/users">Visualizar Usuarios</a>@endcan</li>
                                </nav>
                            </div>
                          @can('role-list')


                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutss" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fab fa-expeditedssl fa-fw"></i></div>
                                 Roles
                                <div class="sb-sidenav-collapse-arrow"></div>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            @endcan
                            <div class="collapse" id="collapseLayoutss" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <li>@can('role-create')

                                        <a class="dropdown-item" href="{{ route('roles.create') }}">Registrar Rol</a></li>
                                        @endcan
                                        <li>
                                            @can('role-list')


                                            <a class="dropdown-item" href="/roles">Visualizar Roles</a></li>
                                            @endcan</nav>


                    </div>
                    @can('visita-list')


                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsis" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-child fa-fw"></i></div>
                         Visitas
                        <div class="sb-sidenav-collapse-arrow"></div>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        @endcan </a>
                    <div class="collapse" id="collapseLayoutsis" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <li>
                               @can('visita-create')


                                <a class="dropdown-item" href="{{ route('visitas.create') }}">Registrar Visita</a></li>
                                @endcan<li>
                                  @can('visita-list')

                                 <a class="dropdown-item" href="/visitas">Visualizar Visitas</a>  @endcan </li>
                        </nav>


            </div>
            @can('horas-list')
                
           
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsiss" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-child fa-fw"></i></div>
                         Control de Entradas y Salidad
                        <div class="sb-sidenav-collapse-arrow"></div>
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                       </a>
                    <div class="collapse" id="collapseLayoutsiss" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <li>


                                @can('horas-create')
                 
                                <a class="dropdown-item" href="{{ route('controles.create') }}">Registrar Entradas y Salidas</a></li>
                                @endcan
                                 <li>
                                    @can('horas-list')
                                        
                                   
                                 <a class="dropdown-item" href="/controles">Visualizar Entradas y Salidas</a>
                                </li>
                                 @endcan
                                </nav>
                                @endcan

                            </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">



                        <div class="row">



                       <div class="content">
        @yield('content')
    </div>

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Derechos Reservados &copy; 2024-2025</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

           <script src="{{ asset('js2/datatables-simple-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>



        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ asset('js2/select2.min.js') }}"></script>

  <script>
    $(document).ready(function() {
      $('#opciones').select2();
    });
  </script>
    </body>
</html>
