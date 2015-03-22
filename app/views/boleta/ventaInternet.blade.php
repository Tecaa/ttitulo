@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()

@section('content')

<div class="col-md-9 col-sm-9">
  <h3>Venta </h3>

  <div class="row confirm">
    <div class="col-md-15">
      <form class="form-horizontal" role="form" action="/boleta/aceptarPedido/{{$documento->cod_documento}}" method="POST">

        <hr>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Código documento </label>
          <div class="col-sm-7">
            <input type="text" name="cod_documento" class="form-control" value="{{$documento->cod_documento}}" readonly>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5 control-label">Rut Cliente </label>
          <div class="col-sm-7">
            <input type="text" name="rutCliente" class="form-control" value="{{$documento->rut}}" readonly>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Fecha de pago (*)</label>
          <div class="col-sm-7">
            <input type="date" name="fecha"class="form-control" placeholder="DD/MM/AA : " required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Hora de pago (*)</label>
          <div class="col-sm-7">
            <input type="time" name="hora"class="form-control" required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Monto pagado (*)</label>
          <div class="col-sm-7">
            <input type="number" min=0 name="monto" class="form-control" required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Banco (*)</label>
          <div class="col-sm-7">
            <select class="form-control" name="banco" required>
              <option value=0>Ninguno</option>
              @foreach ($bancos as $banco)
              <option value="{{ $banco->cod_banco }}">{{ $banco->nom_banco}}</option>
              @endforeach
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Tipo de pago (*)</label>
          <div class="col-sm-7">
            <select class="form-control" name="tipo_pago" required>
              <option value='deposito'>Depósito</option>
              <option value='transferencia'>Transferencia</option>
              <option value='credito'>Crédito</option>
              <option value='efectivo'>Efectivo</option>
            </select>
          </div>
        </div>
        
        <h3>Detalle Venta</h3>
  <hr>
  <div class="row confirm">
  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="ventasTable" width="100%">
      <thead align="center">
        <th>Nombre Producto</th>
        <th>Laboratorio</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>SubTotal</th>
      </thead>
      <tbody>
        
      </tbody>
    </table>
       <br />
    <div class="form-group pull-right col-sm-5">
      <label class="col-sm-5 control-label">Cantidad</label>
      <div class="col-sm-7">
        <div class="pull-right">
          <input type="text" name="cantidadTotal" class="form-control" value="{{$documento->cantidad_total}}" readonly >
        </div> 
      </div>

      <label class="col-sm-5 control-label">Total</label>
      <div class="col-sm-7">
        <div class="pull-right">
          <input type="text" name="total" class="form-control" value="{{$documento->precioTotalF}}" readonly >
        </div> 
      </div>
    </div>

    
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-10">
        <br> <br>
        <div class="pull-right">
          <button type="submit" class="btn btn-purple">Realizar Venta</button> 
        </div>  
      </div>
    </div>
      </form>

    </div>
  </div>
  
  

  </div>
  </div>
</div>


@stop
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/ventaInternet.js') }}
@stop()