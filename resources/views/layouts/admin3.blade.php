<!doctype html>
<!--[if IE 9]> <html class="no-js ie9 fixed-layout" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js " lang="en">
<!--<![endif]-->

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Site Meta -->
    <title>EduTool</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="/images/top-icon.ico" type="image/x-icon" />
    <link rel="top-icon" href="top-icon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />

    <!-- Custom & Default Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/carousel.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/style.css">
    {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}



    <style>
        body {
            color: #606266;
        }
    </style>

</head>

<body>

    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="/images/loader.gif" alt="">
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div id="wrapper">
        <!-- BEGIN # MODAL LOGIN -->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Begin # DIV Form -->
                    <div id="div-forms">
                        <form id="login-form">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="flaticon-add" aria-hidden="true"></span>
                            </button>
                            <div class="modal-body">
                                <input class="form-control" type="text" placeholder="What you are looking for?"
                                    required>
                            </div>
                        </form><!-- End # Login Form -->
                    </div><!-- End # DIV Form -->
                </div>
            </div>
        </div>
        <!-- END # MODAL LOGIN -->

        <header class="header header-normal">
            <div class="topbar clearfix">
                <div class="container">
                    <div class="row-fluid">
                        <div class="col-md-6 col-sm-6 text-left">
                            <!--  <p>
                                <strong><i class="fa fa-phone"></i></strong> +90 543 123 45 67 &nbsp;&nbsp;
                                <strong><i class="fa fa-envelope"></i></strong> <a href="mailto:#">info@yoursite.com</a>
                            </p>    -->
                        </div><!-- end left -->
                        <div class="col-md-6 col-sm-6 hidden-xs text-right">
                            <div class="social">
                                <a class="facebook" href="#" data-tooltip="tooltip" data-placement="bottom"
                                    title="Facebook"><i class="fa fa-facebook"></i></a>
                                <a class="twitter" href="#" data-tooltip="tooltip" data-placement="bottom"
                                    title="Twitter"><i class="fa fa-twitter"></i></a>
                                <a class="google" href="#" data-tooltip="tooltip" data-placement="bottom"
                                    title="Google Plus"><i class="fa fa-google-plus"></i></a>
                                <a class="linkedin" href="#" data-tooltip="tooltip" data-placement="bottom"
                                    title="Linkedin"><i class="fa fa-linkedin"></i></a>
                                <a class="pinterest" href="#" data-tooltip="tooltip" data-placement="bottom"
                                    title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            </div><!-- end social -->
                        </div><!-- end left -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end topbar -->

            <div class="container">
                <nav class="navbar navbar-default yamm">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="logo-normal">
                            <a class="navbar-brand" href="index.html"><img src="/images/logo-dark.png" alt=""></a>
                        </div>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="/">Home</a></li>
                            @guest
                            @else
                            <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false">Tasks <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/task">Table of Specifications</a></li>


                                    <li class="dropdown hassubmenu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                            aria-expanded="false">Multiple-choice Test Questions</a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="/addquestion#/addquestion">Add Questions</a></li>
                                            <li><a href="/question/show#/showquestion">Show Questions</a></li>
                                            <li><a href="/question/createtest#/createtest">Create Question Paper</a>
                                            </li>

                                        </ul>
                                    <li>


                                </ul>
                                @endguest
                            <li><a href="/about">About</a></li>

                            <li><a href="/contact">Contact</a></li>
                            @guest
                            @else
                            <li class="dropdown hassubmenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false">{{ Auth::user()->name }} <span
                                        class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu" style="right:0 !important" role="menu">

                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </li>

                                </ul>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div><!-- end container -->
        </header>

        @yield('content')

        <footer class="section footer noover">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="widget clearfix">
                            <h3 class="widget-title">About EduTool</h3>
                            <div class="newsletter-widget">
                                <p>This site provides an automated tool for Table of Specification (TOS) and
                                    Multiple-choice
                                    Test generation.</p>
                            </div><!-- end newsletter -->
                        </div><!-- end widget -->
                    </div><!-- end col -->


                    <div class="col-lg-3 col-md-3">
                        <div class="widget clearfix">

                        </div><!-- end widget -->
                    </div><!-- end col -->


                </div><!-- end row -->
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="copyrights">
            <div class="container">
                <div class="clearfix">
                    <div class="pull-left">
                        <div class="cop-logo">
                            <a href="#"><img src="/images/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="footer-links">
                            <ul class="list-inline">
                                <p>Copyright ©2020 All rights reserved.</p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- end container -->
        </div><!-- end copy -->
    </div><!-- end wrapper -->

    <!-- jQuery Files -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    {{-- <script src="js/carousel.js"></script> --}}
    <script src="/js/animate.js"></script>
    <script src="/js/custom.js"></script>
    <!-- VIDEO BG PLUGINS -->
    <script src="/js/videobg.js?"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAkADq7R0xf6ami9YirAM1N-yl7hdnYBhM ">
    </script> --}}
    <!-- MAP & CONTACT -->
    {{-- <script src="js/map.js"></script> --}}
    <script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js"
        integrity="sha512-tAGcCfR4Sc5ZP5ZoVz0quoZDYX5aCtEm/eu1KhSLj2c9eFrylXZknQYmxUssFaVJKvvc0dJQixhGjG2yXWiV9Q=="
        crossorigin=""></script>
    <script>
        var mymap
              var marker
              var latestId = 0
        
              $(function () {
                getCurrentLocation(true)
              })
        
              function getCurrentLocation(isFirstLoad) {
               
                var latitude = "11.771184"
                var longitude = "124.886231"
        
                renderMap(latitude, longitude);
              }
        
              function renderMap(latitude, longitude) {
                console.log("latitude: " + latitude)
                console.log("longitude: " + longitude)
        
                var floatLatitude = parseFloat(latitude)
                var floatlongitude = parseFloat(longitude)
                mymap = L.map("mapId").setView([floatLatitude, floatlongitude], 18)
                marker = L.marker([floatLatitude, floatlongitude]).addTo(mymap)
                marker
                  .bindPopup(
                    '<p style="text-align: center;"><b>Visit Our Office</b><br><br>Arteche Blvd, Brgy.Guindapunan <br> Catbalogan City</p>'
                  )
                  .openPopup()
        
                L.tileLayer(
                  "https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw",
                  {
                    maxZoom: 18,
                    id: "mapbox.streets",
                  }
                ).addTo(mymap)
              }
        
    </script>

</body>

</html>