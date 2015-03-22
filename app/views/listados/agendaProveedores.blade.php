@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')

<div class="col-md-9 col-sm-9">
  <h3>Agenda de proveedores</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="agendaProveedoresTable" width="100%">
      <thead align="center">
      
       <tr> 
        <th>Rut</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Ciudad</th>
        <th>Teléfono</th>
        <th>Email</th>
       </tr>  
      </thead> 
      
      <tbody>  
        
      </tbody>
    </table>
  </div>
</div>


@stop
      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/agendaProveedores.js') }}
@stop()