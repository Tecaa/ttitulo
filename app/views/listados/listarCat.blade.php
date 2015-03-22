@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')

<!-- begin:product-sidebar -->
				<div class="col-md-3 col-sm-3">
					<div class="row sidebar">
						<div class="col-md-12">
								
							<h3>Menú</h3>
							<ul class="nav nav-pills nav-stacked">
              <li>
					      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Listados <i class="fa fa-caret-down icon-dropdown"></i></a>
					      <ul class="dropdown-menu sub-menu">
                   <li><a href="/listado/listarProductos">Productos</a></li>
                   <li><a href="/listado/listarCat">Categorías</a></li>
                   <li><a href="/listado/listarLab">Laboratorios</a></li>                    
					      </ul>
				      </li>
                
                <li>
					      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Realizar Venta<i class="fa fa-caret-down icon-dropdown"></i></a>
					      <ul class="dropdown-menu sub-menu">
                    <li><a href="/venta/local">Local</a></li>
				            <li><a href="/venta/internet">Internet</a></li>
                  
                    
					      </ul>
				      </li>
                <li><a href="/listado/pedidos">Orden de compra</a></li>
							</ul>
							
							<br>
              <br>
						</div>
					</div>
				</div>
				<!-- end:product-sidebar -->

<div class="col-md-9 col-sm-9">
  <h3>Listado de Categorías</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="categoriasTable" width="100%">
      <thead align="center">
        <th>Código</th>
        <th>Nombre Categoría</th>
      </thead>
      <tbody>


      </tbody>
    </table>
  </div>
</div>


@stop
      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/listarCat.js') }}
@stop()