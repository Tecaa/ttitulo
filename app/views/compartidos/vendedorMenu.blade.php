<!-- begin:product-sidebar -->
<div class="col-md-3 col-sm-3">
  <div class="row sidebar">
    <div class="col-md-12">

      <h3>Menú</h3>
      <ul class="nav nav-pills nav-stacked">
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Listados <i class="fa fa-caret-down icon-dropdown"></i></a>
          <ul class="dropdown-menu sub-menu">
            <li><a href="/listado/productos">Productos</a></li>
            <li><a href="/listado/categorias">Categorías</a></li>
            <li><a href="/listado/proveedores">Proveedores</a></li>                    
          </ul>
        </li>

        <li>
          <a href="/venta/local">Realizar venta en local</a>
        </li>

        <li><a href="/listado/pedidos">Realizar venta de internet
          @if($numpedidos != 0)
          <span class="badge">{{$numpedidos}}</span>
          @endif
          </a>
        </li>
        
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mi Cuenta<i class="fa fa-caret-down icon-dropdown"></i></a>
          <ul class="dropdown-menu sub-menu">
            <li><a href="/micuenta">Mi Cuenta</a></li>
            <li><a href="/micuenta/modificar">Modificar Datos</a></li>
            <li><a href="/micuenta/modificar/pass">Cambiar Contraseña</a></li>
          </ul>
        </li>
        
        
          
      </ul>

      <br>
      <br>
    </div>
  </div>
</div>
<!-- end:product-sidebar -->
