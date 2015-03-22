@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')

<div class="col-md-9 col-sm-9">
  <h3>Vendedores</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="vendedoresTable" width="100%">
      <thead align="center">
      
       <tr> 
        <th>Rut</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Ciudad</th>
         <th>Fecha nac.</th>
        <th>Sexo</th> 
        <th>Teléfono</th>
        <th>Email</th>
         <th>Acciones</th> 
       </tr>  
      </thead> 
      
      <tbody>
             
      </tbody>
    </table>
    
     <br>
    <a class="btn btn-primary" href="/vendedor/crear" role="button">Agregar vendedor</a>
  
    
  </div>
</div>


@stop
      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/listaVendedor.js') }}
@stop()