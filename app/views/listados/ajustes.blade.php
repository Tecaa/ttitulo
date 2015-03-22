@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')

<div class="col-md-9 col-sm-9">
  <h3>Listado Ajustes</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="ajusteTable" width="100%">
      <thead align="center">
      
       <tr> 
        <th>Codigo producto</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Cantidad</th>
        <th>Descripcion</th>
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
  {{ HTML::script('js/ajustes.js') }}
@stop()