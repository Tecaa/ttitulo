@section('content')

@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


<div class="col-md-9 col-sm-9">
  <h3>Detalle del pedido de Internet</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="detalleTable" width="100%">
      <thead align="center">
        <th>ID producto</th>
        <th>Nombre</th>
        <th>Laboratorio</th>
        <th>Stock</th>
        <th>Precio unitario</th>
        <th>Cantidad Pedida</th>
        <th>Subtotal</th>
      </thead>
      <tbody>
      </tbody>
    </table>
    
  </div>
</div>

@stop
      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/detallePedido.js') }}
@stop()