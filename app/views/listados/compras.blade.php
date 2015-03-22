@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')

<div class="col-md-9 col-sm-9">
  <h3>Informe de Compras</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="comprasTable" width="100%">
      <thead align="center">

        <th>Código</th>
        <th>Fecha compra</th>
        <th>Rut Proveedor</th>
        <th>N° productos</th>
        <th>Total Compra</th>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>
</div>


@stop
      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/listadoCompras.js') }}
@stop()