<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

    <!-- CSS Files -->
    <link href="/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/css/material-kit.css" rel="stylesheet"/>
    <link href="/css/vertical-nav.css" rel="stylesheet"/>
    <title>MKV - Rovix</title>
</head>
<body class="section-white">

<nav class="navbar navbar-danger navbar-fixed-top" id="sectionsNav">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">ROVIX</a>
        </div>

        <div class="collapse navbar-collapse" id="navigation-example">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{url('/perfil')}}">
                        PERFIL
                    </a>
                </li>
                <li>
                    <a href="{{url('/recursos')}}">
                        RECURSOS
                    </a>
                </li>
                <li>
                    <a href="{{url('/')}}">
                        {{--<i class="material-icons">apps</i>--}} SALIR
                    </a>
                </li>
                <li>
                    <a href="{{url('/about')}}">
                        ABOUT
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<div class="section-space"></div>

<div class="container">
    @yield('content')
</div>

<footer class="footer footer-black">
    <div class="container">
        <a class="footer-brand" href="#pablo">Rovix</a>

        <ul class="pull-center">
            {{--<li>
                <a href="#pablo">
                    Blog
                </a>
            </li>
            <li>
                <a href="#pablo">
                    Presentation
                </a>
            </li>
            <li>
                <a href="#pablo">
                    Discover
                </a>
            </li>
            <li>
                <a href="#pablo">
                    Payment
                </a>
            </li>
            <li>
                <a href="#pablo">
                    Contact Us
                </a>
            </li>--}}
        </ul>

        <ul class="social-buttons pull-right">
            <li>
                <a href="https://twitter.com/CreativeTim" target="_blank" class="btn btn-just-icon btn-simple">
                    <i class="fa fa-github"></i>
                </a>
            </li>
        </ul>

    </div>
</footer>

<!--   Core JS Files   -->
<script src="/js/jquery.min.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/js/material.min.js"></script>

<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="/js/nouislider.min.js" type="text/javascript"></script>

<!--	Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="/js/bootstrap-datepicker.js" type="text/javascript"></script>

<!--	Plugin for Select Form control, full documentation here: https://github.com/FezVrasta/dropdown.js -->
<script src="/js/jquery.dropdown.js" type="text/javascript"></script>

<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/  -->
<script src="/js/jquery.tagsinput.js"></script>

<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="/js/jasny-bootstrap.min.js"></script>

<!-- Plugin For Google Maps -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="/js/material-kit.js" type="text/javascript"></script>

<!-- Fixed Sidebar Nav - JS For Demo Purpose, Don't Include it in your project -->
<script src="/assets-for-demo/modernizr.js" type="text/javascript"></script>
<script src="/assets-for-demo/vertical-nav.js" type="text/javascript"></script>

<script type="text/javascript">
    $().ready(function () {

        materialKitDemo.initContactUs2Map();
    });
</script>

</body>


</html>