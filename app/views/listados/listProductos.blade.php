@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')


<div class="col-md-9 col-sm-9">
  <h3>Listado de Productos</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="productosTable" width="100%">
      <thead align="center">
      
       <tr> 
        <th>Código de barras</th> 
        <th>Nombre</th>
        <th>Laboratotio</th>
        <th>Cantidad</th>
        <th>$ Venta</th>
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
  {{ HTML::script('js/listProductos.js') }}
@stop()