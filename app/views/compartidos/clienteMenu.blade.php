<!-- begin:product-sidebar -->

<div class="col-md-3 col-sm-3">
  <div class="row sidebar">
    <div class="col-md-12">

      <h3>Menú</h3>
      <ul class="nav nav-pills nav-stacked">
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mi Cuenta<i class="fa fa-caret-down icon-dropdown"></i></a>
          <ul class="dropdown-menu sub-menu">
            <li><a href="/micuenta">Mi Cuenta</a></li>
            <li><a href="/micuenta/modificar">Modificar Datos</a></li>
            @if(Auth::user()->fb_id == null)
            <li><a href="/micuenta/modificar/pass">Cambiar Contraseña</a></li>
            @endif
          </ul>
        </li>
        <li><a href="/listado/carroCompras">Carro de Compras</a></li> 
        <!--
        <li><a href="product.html">Pedidos Anteriores</a></li>  
-->
      </ul>

      <br>
      <br>
    </div>
  </div>
</div>

<!-- end:product-sidebar -->