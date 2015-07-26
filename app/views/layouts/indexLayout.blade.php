<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="description" content="dodolan manuk responsive catalog themes built with twitter bootstrap">
    <meta name="keywords" content="responsive, catalog, cart, themes, twitter bootstrap, bootstrap">
    <meta name="author" content="afriq yasin ramadhan">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <title>{{$titulo}} - Centro Naturista Masiel</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('css/bootstrap.css') }}
    <!-- Custom styles for this template -->
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('css/responsive.css') }}
    {{ HTML::style('css/listarProductos.css') }}
    @yield('extra-css')
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
  </head>

  <body>
    	@include('compartidos.navbar')

    @yield('content')


     @include('compartidos.footer')

    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('js/bootstrap.js') }}
    {{ HTML::script('http://maps.google.com/maps/api/js?sensor=false&amp;language=en') }}
    {{ HTML::script('js/gmap3.js') }}
    {{ HTML::script('js/script.js') }}
    {{ HTML::script('js/numberFormater.js') }}
    {{ HTML::script('js/carritoComprasCounter.js') }}
    @yield('extra-js')
  </body>
</html>