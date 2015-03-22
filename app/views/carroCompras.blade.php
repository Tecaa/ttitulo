@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


<div class="col-md-9 col-sm-9">
  <h3>Pedido</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="categoriasTable" width="100%">
      <thead align="center">
        <th></th>
        <th>Nombre Producto</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Total</th>
        <th></th>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</div>


      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/listadoCategorias.js') }}
@stop()