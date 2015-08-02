@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')

<div class="col-md-9 col-sm-9">
  <h3>Proveedores</h3>

  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="proveedoresTable" width="100%">
      <thead align="center">
      
       <tr> 
        <th>Rut</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Ciudad</th>
        <th>Teléfono</th>
        <th>Email</th>
         @if(Auth::user()->tipo_usuario == "administrador")
        <th>Acciones</th>
         @endif
       </tr>  
      </thead>  
      <tbody>
       
      </tbody>
    </table>
    @if(Auth::user()->tipo_usuario == "administrador")
   <br> 
 
    <a class="btn btn-primary" href="/proveedores/crear" role="button">Agregar proveedor</a>
    @endif
    
  </div>
</div>


@stop
      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/proveedores.js') }}
@stop()