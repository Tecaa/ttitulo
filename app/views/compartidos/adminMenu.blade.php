<!-- begin:product-sidebar -->
<div class="col-md-3 col-sm-3">
  <div class="row sidebar">
    <div class="col-md-12">

      <h3>Menú</h3>
      <ul class="nav nav-pills nav-stacked">

        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mantenedores <i class="fa fa-caret-down icon-dropdown"></i></a>
          <ul class="dropdown-menu sub-menu">
            <li><a href="/listado/productos">Productos</a></li>
            <li><a href="/listado/categorias">Categorías</a></li>
            <!--<li><a href="/listado/laboratorios">Laboratorios</a></li>-->
            <li><a href="/listado/vendedores">Vendedores</a></li>
            <li><a href="/listado/clientes">Clientes</a></li>
            <li><a href="/listado/proveedores">Proveedores</a></li>
            <li><a href="/listado/bancos">Bancos</a></li>
            <li><a href="/listado/ciudades">Ciudades</a></li>
            <li><a href="/listado/metodos/envios">Métodos Envío</a></li>
          </ul>
        </li>
        <!--
<li>
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Listados <i class="fa fa-caret-down icon-dropdown"></i></a>
<ul class="dropdown-menu sub-menu">
<li><a href="/listado/listarProductos">Productos</a></li>
<li><a href="/listado/listarCat">Categorías</a></li>
<li><a href="/listado/listarLab">Laboratorios</a></li>
<li><a href="/listado/eliminados">Productos eliminados</a></li>
</ul>
</li>
-->
        <li><a href="/venta/local">Realizar Venta Local</a></li>
        <li><a href="/listado/pedidos">Realizar Venta Internet 
          @if($numpedidos != 0)
          <span class="badge">{{$numpedidos}}</span>
          @endif
          </a></li>

        <li><a href="/compra/factura">Realizar compra</a></li>
        
        
         <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Encargos <i class="fa fa-caret-down icon-dropdown"></i></a>
          <ul class="dropdown-menu sub-menu">
            <li><a href="/listado/encargos">Encargos pendientes</a></li>
            <li><a href="/listado/encargosHistorial">Historial</a></li>
          </ul>
        </li>
        

        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Informes <i class="fa fa-caret-down icon-dropdown"></i></a>
          <ul class="dropdown-menu sub-menu">
            <li><a href="/listado/compras">Informe de Compras</a></li>
            <li><a href="/boleta/historial">Informe de Ventas</a></li>
            <li><a href="/listado/ajustes">Informe de ajustes</a></li>
            <li><a href="/producto/stockCritico">Bajo stock</a></li>
          </ul>
        </li>
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Eliminados <i class="fa fa-caret-down icon-dropdown"></i></a>
          <ul class="dropdown-menu sub-menu">
            <li><a href="/listado/eliminados">Productos eliminados</a></li>
            <li><a href="/listado/vendedores/desactivados">Vendedores eliminados</a></li>
          </ul>
        </li>


        <li><a href="/agendaProveedores">Agenda proveedores</a></li>
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mi Cuenta<i class="fa fa-caret-down icon-dropdown"></i></a>
          <ul class="dropdown-menu sub-menu">
            <li><a href="/micuenta">Mi Cuenta</a></li>
            <li><a href="/micuenta/modificar">Modificar Datos</a></li>
            <li><a href="/micuenta/modificar/pass">Cambiar Contraseña</a></li>
          </ul>
        </li>
      </ul>


    </div>
  </div>
</div>
<!-- end:product-sidebar -->
