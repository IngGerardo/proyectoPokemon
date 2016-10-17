<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset("img/goe.ico") }}" />
    <title>Pokemon Go</title>
    <!-- Core CSS - Include with every page -->
    <link rel="stylesheet" href="{{ asset("plugins/bootstrap/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("font-awesome/css/font-awesome.css") }}">
    <link rel="stylesheet" href="{{ asset("plugins/pace/pace-theme-big-counter.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("css/main-style.css") }}">
    <!-- Page-Level CSS -->
    <link rel="stylesheet" href="{{ asset("plugins/morris/morris-0.4.3.min.css") }}">
    <script src="{{ asset("plugins/jquery.js") }}"></script>
    </head>

<body>
 <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{ asset("img/logo.png") }}" alt="" width="220px" height="350px" />
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li><a href="{{url('/RegistroPokemon')}}"><i class="fa fa-pinterest-square fa-2x"></i></a></li>
                
                <li><a href="{{url('/RegistroPolvos')}}"><i class="fa fa-magic fa-2x"></i></a></li>

                <li><a href="{{url('/RegistroCaramelos')}}"><i class="fa fa-heart  fa-2x"></i></a></li>

            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side fixed" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-info">
                                <img src="{{ asset("img/pokebola.png") }}" alt="" width="40px" height="40px" align="left">&nbsp;<strong> Pokémon </strong>Go
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                     @foreach ($tipos as $tipo)
                    <li>
                        <a href="{{ url('/tipos') }}/{{ $tipo->id }}">
                        {{$tipo->nombre}} <i class="fa fa-chevron-right"></i>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    @yield('encabezado')
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    @yield('contenido')
                </div>
                <!--end  Welcome -->
            </div>


           
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->
    
    <script src="{{ asset("plugins/bootstrap/bootstrap.min.js") }}"></script>
    <script src="{{ asset("plugins/metisMenu/jquery.metisMenu.js") }}"></script>
    <script src="{{ asset("plugins/pace/pace.js") }}"></script>
    <script src="{{ asset("scripts/siminta.js") }}"></script>
    <!-- Page-Levl Plugin Scripts-->
</body>