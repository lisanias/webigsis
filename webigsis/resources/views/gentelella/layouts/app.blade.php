<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title or config('app.name', 'WebIG 2')}}</title>

    <!-- Styles -->

    <!-- Bootstrap -->
    <link href="{{ asset('gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('gentelella/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('gentelella/build/css/custom.min.css') }}" rel="stylesheet">

    <!-- Custom App Style -->
    <link href="{{ asset('css/css.css') }}" rel="stylesheet">

    @stack('styles')
    

</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    
                    <!-- Branding Image -->
                    <div class="navbar nav_title" style="border: 0;">
                        <a class="site_title" href="{{ url('/') }}">
                            <i class="fa fa-pie-chart"></i> 
                            <span class='web-dark'>web</span><span class='ig-dark'>IG</span class='ig-dark'><span class='sis-dark'>.sis</span> <span class="fonte-slin"> | </span> <span class="msm">MSM</span>
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                      <div class="profile_pic">
                        <img src="{{ asset('user-images') }}/{{ Auth::user()->avatar}}" alt="..." class="img-circle profile_img">
                      </div>
                      <div class="profile_info">
                        <span>Olá,</span>
                        <h2>{{ Auth::user()->name }}</h2>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Geral</h3>
                            <ul class="nav side-menu">
                                @include("gentelella.layouts.includes.menuLateral")
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Home">
                            <span class="fa fa-home" aria-hidden="true"></span>
                        </a>
                        <a id="fs" data-toggle="tooltip" data-placement="top" title="Tela Inteira" 
                            onclick="launchFullScreen(document.documentElement);">
                            <span class="fa fa-arrows-alt" aria-hidden="true"></span>
                        </a>

                        <a data-toggle="tooltip" data-placement="top" title="Ajuda">
                            <span class="fa fa-question-circle" aria-hidden="true"></span>
                        </a>

                        <a data-toggle="tooltip" data-placement="top" title="Sair" 
                                    href="{{ route('logout') }} 
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">

                            <span class="fa fa-power-off" aria-hidden="true"></span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <!-- /menu footer buttons -->

                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        @include("gentelella.layouts.includes.menuTopo")
                    </nav>
                </div>
            </div>
             <!-- /top navigation -->
             
        </div>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                
                <div class="page-title">
                    <div class="title_left">
                        <h3>{!!$label or '<i class="fa fa-bullseye" aria-hidden="true"></i>'!!}</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Procurar por...">
                            <span class="input-group-btn">
                              <button class="btn btn-default" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </span>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">

                            @yield('content')

                        </div>
                    </div>

            </div>
        </div>
    
    </div>

    <!-- Scripts -->
    
    <!-- jQuery -->
    <script src="{{ asset('gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('gentelella/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('gentelella/vendors/nprogress/nprogress.js') }}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('gentelella/build/js/custom.min.js') }}"></script>
    <script src="{{ asset('js/js.js') }}"></script>

    @stack('scripts')
</body>
</html>
