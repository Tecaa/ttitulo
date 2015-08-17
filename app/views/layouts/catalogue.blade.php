<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
   <meta name="description" content="Tienda online de joyas ubicada en La Calera">
    <meta name="keywords" content="joyas, joyeria, joyería, calera, la calera, sagitario, sagitario joyas, joyas sagitario, quillota, la cruz, joyas online, joyeria online, joyas v region, joyeria v region, anillo, anillos, pendiente, pendientes, oro, plata, acero, acero quirurgico, acero quirúrgico, bañado en oro, bañado en plata, anillos de compromiso, regalos mujer, cadenas">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">

    <title>{{$titulo}} - Joyas Sagitario</title>
    
    <!-- Bootstrap core CSS -->
    {{ HTML::style('css/bootstrap.min.css') }}
    <!-- Custom styles for this template -->
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('css/responsive.css') }}

    @yield('extra-css')

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	@include('compartidos.navbar')
	@include('compartidos.header')
	
	<!-- begin:product -->
	<div id="catalogue">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
				      <li><a href="/">Inicio</a></li>
				      <!--<li ><a href="#">Productos</a></li>-->
            <li class="active">{{$titulo}}</li>
				    </ol>
				</div>
			</div>

        <div class="row">

          <!-- begin:page-content -->
          @yield('content')
        </div>
      </div>
    </div>

  @include('compartidos.footer')

    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('http://maps.google.com/maps/api/js?sensor=false&amp;language=en') }}
    {{ HTML::script('js/gmap3.js') }}
    {{ HTML::script('js/script.js') }}
    {{ HTML::script('js/numberFormater.js') }}
    {{ HTML::script('js/carritoComprasCounter.js') }}
    {{ HTML::script('js/googleAnalytics.js') }}
    @yield('extra-js')
  </body>
</html>