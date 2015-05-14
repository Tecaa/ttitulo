@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')

<div class="col-md-9 col-sm-9">
  <h3>Métodos de Envío</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="metodosTable" width="100%">
      <thead align="center">
        <th>Código</th>
        <th>Método Envío</th>
        <th>Costo</th>
        <th>Acciones</th>
      </thead>
      <tbody>
        
      </tbody>
    </table>
    
    <br>
    <a class="btn btn-primary" href="/envio/crear" role="button">Agregar método</a>
  </div>
</div>


@stop
      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/metodosenvio.js') }}
@stop()