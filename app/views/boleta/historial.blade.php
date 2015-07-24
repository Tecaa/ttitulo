@section('content')

@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


<div class="col-md-9 col-sm-9">
  <h3>Historial de ventas</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="boletasTable" width="100%">
      <thead align="center">
        <th>Codigo documento</th>
        <th>Estado</th>
        <th>Fecha y hora</th>
        <th>Rut Cliente</th>
        <th>Nombre Cliente</th>
        <th>Cantidad productos</th>
        <th>Total</th>
        <th>Acciones a realizar</th>
      </thead>
      <tbody>
      </tbody>
    </table>
    
  </div>
</div>

@stop
      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/boletaHistorial.js') }}
@stop()