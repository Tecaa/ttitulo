@section('extra-css')
{{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')

<div class="col-md-9 col-sm-9">
  <h3>Encargos antiguos</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="encargosTable" width="100%">
      <thead align="center">
        <th>Código</th>
        <th>Rut Cliente</th>
        <th>Nombre Cliente</th>
        <th>Fecha encargo</th>
        <th>Estado</th>
        <th>Monto abonado</th>
        <th>Código producto</th>
        <th>Cantidad encargada</th>
        <th>Rut Vendedor</th>
        <th>Acciones</th>
      </thead>
      <tbody>
      </tbody>
    </table>

    <br>
  </div>
</div>


@stop

@section('extra-js')
{{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
{{ HTML::script('js/listadoEncargosHistorial.js') }}
@stop()