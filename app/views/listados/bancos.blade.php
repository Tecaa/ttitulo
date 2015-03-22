@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')

<div class="col-md-9 col-sm-9">
  <h3>Bancos</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="bancosTable" width="100%">
      <thead align="center">
        <th>Código</th>
        <th>Nombre Banco</th>
        <th>Acciones</th>
      </thead>
      <tbody>
        
      </tbody>
    </table>
    
    <br>
    <a class="btn btn-primary" href="/bancos/crear" role="button">Agregar banco</a>
  </div>
</div>


@stop
      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/listadoBancos.js') }}
@stop()