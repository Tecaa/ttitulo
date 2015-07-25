@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
    {{ HTML::style('css/listarProductos.css') }}
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
      <div class="form-group">
        <label class="col-sm-8 control-label pull-right">Suma pedido</label>
        <div class="col-sm-8 pull-right">
          <label class="control-label h5 pull-right" id="suma"></label>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-8 control-label pull-right">Método de envío</label>
        <div class="col-sm-8 pull-right">
          <select class="form-control" id="metodo" required="">
            @foreach ($metodos as $metodo)
            <option value={{$metodo->cod_metodo}}>{{$metodo->nombre}} (+{{$metodo->costoF}})</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-8 control-label pull-right">Total a pagar</label>
        <div class="col-sm-8 pull-right">
          <h3 class="control-label hPrecio" id="total"></h3>
        </div>
      </div>
      <br />
      <div class="form-group">

        @if (Auth::check())
        <a class="btn btn-success pull-right col-sm-8" id="pedido" role="button">Realizar pedido</a>
        @else
        <a class="btn btn-success pull-right" href="/cuenta/login" role="button">Iniciar sesión para pagar</a>
        @endif
      </div>
    </div>
  </div>
</div>


@stop
      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/carroCompras.js') }}
@stop()