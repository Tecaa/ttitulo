@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')

<div class="col-md-9 col-sm-9">
  <h3>Vendedores</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="vendedoresTable" width="100%">
      <thead align="center">

        <th>Rut</th>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Ciudad</th>
        <th>Teléfono</th>
        <th>Mail</th>
        <th>Activar</th>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</div>



@stop
      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/vendedoresElim.js') }}
@stop()