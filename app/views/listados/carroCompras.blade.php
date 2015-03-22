@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')

<div class="col-md-9 col-sm-9">
  <h3>Carro de Compras</h3>


  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="carroTable" width="100%">
      <thead align="center">
        
        <th>Nombre</th>
        <th>Laboratorio</th>
        <th>Cantidad comprada</th>
        <th>Precio unitario</th>
        <th>Subtotal</th>
        <th>Eliminar</th>
      </thead>
      <tbody>
        
      </tbody>
    </table>
    <br />
    <div class="pull-right">
      @if (Auth::check())
      <a class="btn btn-success" id="pedido" role="button">Realizar pedido</a>
      @else
      <a class="btn btn-success" href="/login" role="button">Iniciar sesión para pagar</a>
      @endif
    </div>
  </div>
</div>


@stop
      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/carroCompras.js') }}
@stop()