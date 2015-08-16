<!-- SDK necesario para el plugin de Facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand visible-xs" href="#">Joyas Sagitario</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav nav-left">
        <li class="{{HTML::isActive('/')}}"><a href="/">Inicio</a></li>
        <li class="{{HTML::isActive('quienesSomos')}}"><a href="/quienesSomos">¿Cómo comprar?</a></li>
        <li class="{{HTML::isActive('contacto')}}"><a href="/contacto">Contacto</a></li>
      </ul>
      <a href="#" class="logo visible-lg visible-md">{{ HTML::image("img/logo.jpg", "Logo") }}</a>
      <div id="brand" class="visible-lg visible-md">&nbsp;</div>
      <ul class="nav navbar-nav nav-right">

        <li class="dropdown {{HTML::isActive('producto/categoria/*')}} {{HTML::isActive('producto/consultar/*')}}">
          <a href="#" class="dropdown-toggle" href="" data-toggle="dropdown">Productos <b class="caret"></b></a>
          <ul class="dropdown-menu">
            @foreach ($categorias as $categoria)
            <li><a href="/producto/categoria/{{ $categoria->cod_categoria }}">{{ $categoria->nom_categoria}}</a></li>
            @endforeach
            <!--
<li class="divider"></li>
<li>              
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Faciales <i class="fa fa-caret-down icon-dropdown"></i></a>
<ul class="dropdown-menu sub-menu">
<li><a href="/producto/listar">Cremas</a></li>
<li><a href="/producto/listar">Maquillaje</a></li>
</ul>
</li>

<li>
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Capilares <i class="fa fa-caret-down icon-dropdown"></i></a>
<ul class="dropdown-menu sub-menu">
<li><a href="/producto/listar">Shampooo</a></li>
<li><a href="/producto/listar">Acondicionadores</a></li>
</ul>
</li>

<li class="divider"></li>
<li><a href="/producto/listar">Té</a></li>
<li><a href="/producto/listar">Infusiones</a></li>
<li><a href="/producto/listar">Relajantes</a></li>
-->
          </ul>
        </li>
        @if (Auth::check())
        <li class="{{HTML::isActive('sesion/*')}} {{HTML::isActive('micuenta')}} {{HTML::isActive('micuenta/*')}}"><a href="/sesion">Menu</a></li>
        @endif
        @unless (Auth::check())
        <!-- <li><a href="/login">Iniciar sesión</a></li> -->

        <li class="dropdown {{HTML::isActive('cliente/registrarse')}} {{HTML::isActive('cuenta/login')}}">
          <a href="" class="dropdown-toggle" data-toggle="dropdown">Mi cuenta <b class="caret"></b></a>
          <ul class="dropdown-menu sub-menu">
            <li><a href="/cuenta/login">Iniciar Sesion</a></li>
            <li><a href="/cliente/registrarse">Registrarse</a></li>
          </ul>
        </li>

        @else
        <li><a href="/logout">Cerrar sesión</a></li>
        @endunless



        <li class="{{HTML::isActive('listado/carroCompras')}}"><a href="/listado/carroCompras"> 
            <span id="totalCompras" class="badge alert-danger"></span>
            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
        </a></li>
        
        
        
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>