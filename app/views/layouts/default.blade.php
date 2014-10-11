<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">s
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="description" content="dodolan manuk responsive catalog themes built with twitter bootstrap">
    <meta name="keywords" content="responsive, catalog, cart, themes, twitter bootstrap, bootstrap">
    <meta name="author" content="afriq yasin ramadhan">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <title>Centro Naturista Masiel</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('css/bootstrap.css') }}
    <!-- Custom styles for this template -->
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('css/responsive.css') }}

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand visible-xs" href="#">Dodolan Manuk</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        	<ul class="nav navbar-nav nav-left">
			  <li class="active"><a href="/">Inicio</a></li>
			  <li><a href="/quienesSomos">Quienes somos</a></li>
			  <li><a href="profile.html">Profile</a></li>
			  <li><a href="/contacto">Contacto</a></li>
			</ul>
			<a href="#" class="logo visible-lg visible-md">{{ HTML::image("img/logo.jpg", "Logo") }}</a>
			<div id="brand" class="visible-lg visible-md">&nbsp;</div>
			<ul class="nav navbar-nav nav-right">
			  <li><a href="pricing.html">Categorías</a></li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <b class="caret"></b></a>
				<ul class="dropdown-menu">
				  <li><a href="product.html">Antigripales</a></li>
				  <li><a href="product.html">Sistema nervioso</a></li>
				  <li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Faciales <i class="fa fa-caret-down icon-dropdown"></i></a>
					<ul class="dropdown-menu sub-menu">
					  <li><a href="product.html">Cremas</a></li>
					  <li><a href="product.html">Maquillaje</a></li>
					</ul>
				  </li>
          
          <li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Capilares <i class="fa fa-caret-down icon-dropdown"></i></a>
					<ul class="dropdown-menu sub-menu">
					  <li><a href="product.html">Shampooo</a></li>
					  <li><a href="product.html">Acondicionadores</a></li>
					</ul>
				  </li>
          
				  <li class="divider"></li>
				  <li><a href="product.html">Té</a></li>
				</ul>
			  </li>
        <li><a href="/iniciarSesion">Iniciar sesión</a></li>
			  <li><a href="/order">Compras</a></li>
			</ul>
          
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

        @yield('content')
  

	<!-- begin:footer -->
	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3>dodolan manuk</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis lectus metus,<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

					<ul class="list-unstyled social-icon">
		              <li><a href="#" rel="tooltip" title="Facebook" class="icon-facebook"><span><i class="fa fa-facebook-square"></i></span></a></li>
		              <li><a href="#" rel="tooltip" title="Twitter" class="icon-twitter"><span><i class="fa fa-twitter"></i></span></a></li>
		              <li><a href="#" rel="tooltip" title="Linkedin" class="icon-linkedin"><span><i class="fa fa-linkedin"></i></span></a></li>
		              <li><a href="#" rel="tooltip" title="Instagram" class="icon-gplus"><span><i class="fa fa-google-plus"></i></span></a></li>
		              <li><a href="#" rel="tooltip" title="Instagram" class="icon-instagram"><span><i class="fa fa-instagram"></i></span></a></li>
		            </ul>

					<div class="sitemap">
						<ul>
							<li><a href="index.html">HOME</a></li>
							<li><a href="about.html">ABOUT</a></li>
							<li><a href="profile.html">PROFILE</a></li>
							<li><a href="contact.html">CONTACT</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end:footer -->
	
	<!-- begin:copyright -->
	<div id="copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<small>Copyright &copy; 2013 Dodolan Manuk All Right Reserved. Made With <i class="fa fa-heart-o"></i> by Afriq</small>
				</div>
			</div>
		</div>
	</div>
	<!-- end:copyright -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('js/bootstrap.js') }}
    {{ HTML::script('http://maps.google.com/maps/api/js?sensor=false&amp;language=en') }}
    {{ HTML::script('js/jgmap3query.js') }}
    {{ HTML::script('js/script.js') }}

  </body>
</html>