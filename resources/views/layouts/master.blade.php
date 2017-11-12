<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
          content="Rovix es un mapeador de recursos dirigido principalmente a desarrolladores de sofware. Aquí podrás encontrar enlaces a libros, blogs, canales de youtube, repositorios, podcasts y más!">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

    <!-- CSS Files -->
    <link href="/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/css/material-kit.css" rel="stylesheet"/>
    <link href="/css/vertical-nav.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/css/toastr.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>Rovix: Mapeando conocimiento</title>
</head>
<body class="section-white">

@include('partials.nav')

<div class="section-space"></div>

<div class="container">
    {{--<div class="row">--}}
    @yield('content')
    {{--</div>--}}
</div>

@include('partials.footer')

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
{{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>--}}

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="/js/material-kit.js" type="text/javascript"></script>

<!-- Fixed Sidebar Nav - JS For Demo Purpose, Don't Include it in your project -->
<script src="/assets-for-demo/modernizr.js" type="text/javascript"></script>
<script src="/assets-for-demo/vertical-nav.js" type="text/javascript"></script>

<script src="/js/toastr.js" type="text/javascript"></script>

<script type="text/javascript">
    /*$().ready(function () {

     materialKitDemo.initContactUs2Map();
     });*/

    $(document).ready(function () {

        var docHeight = $(window).height();
        var footerHeight = $('#footer').height();
        var footerTop = $('#footer').position().top + footerHeight;

        if (footerTop < docHeight) {
            $('#footer').css('margin-top', 10 + (docHeight - footerTop) + 'px');
        }
    });
</script>

@yield('script')

</body>


</html>