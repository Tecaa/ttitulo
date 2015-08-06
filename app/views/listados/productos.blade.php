@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')

<div class="col-md-13 col-sm-13">
  <h3>Productos</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="productosTable" width="100%">
      <thead align="center">

        <th>Nombre</th>
        <th>Proveedor</th>
        <th>Cantidad</th>
        <th>Encargados</th>
        <th>$ Compra</th>
        <th>$ Venta</th>
        <th>$ Oferta</th>
        <th>Código de barras</th>
        @if(Auth::user()->tipo_usuario == "administrador")
        <th>Acciones</th>
        @endif
      </thead>
      <tbody>
      </tbody>
    </table>
    <br> 
    @if(Auth::user()->tipo_usuario == "administrador")
    <div class="pull-right">
      <a class="btn btn-primary" href="/producto/crear" role="button">Agregar producto</a>
    </div>
    @endif
  </div>
</div>




@stop
      
@section('extra-js')
{{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
{{ HTML::script('js/dataTables/sorting.currency.js') }}
{{ HTML::script('js/listadoProductos.js') }}
@stop()