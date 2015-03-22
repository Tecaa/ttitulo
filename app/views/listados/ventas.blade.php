@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')

<div class="col-md-9 col-sm-9">
  <h3>Listado de Ventas</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="ventasTable" width="100%">
      <thead align="center">

        <th>Código </th>
        <th>Fecha venta</th>
        <th>Rut Vendedor</th>
        <th>N° productos</th>
        <th>Total Venta</th>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</div>


@stop
      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/listadoVentas.js') }}
@stop()