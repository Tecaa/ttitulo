@section('content')

@section('extra-css')
{{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


<div class="col-md-9 col-sm-9">
  <h3>Detalle del pedido de Internet</h3>

  <div class="row confirm">
    <div class="col-md-15">
      <hr>

      <div class="form-group col-md-12">
        <label class="col-md-5 control-label">Rut Cliente</label>
        <div class="col-md-7">

          <label class="col-md-7 control-label">{{$documento->boleta->cliente->rut}}</label>
        </div>
      </div>

      <div class="form-group col-md-12">
        <label class="col-md-5 control-label">Nombre Cliente</label>
        <div class="col-md-7">

          <label class="col-md-7 control-label">{{$documento->boleta->cliente->nom_usuario}}</label>
        </div>
      </div>

      <div class="form-group col-md-12">
        <label class="col-md-5 control-label">Edad</label>
        <div class="col-md-7">

          <label class="col-md-7 control-label">{{$documento->boleta->cliente->edad}}</label>
        </div>
      </div>

      <div class="form-group col-md-12">
        <label class="col-md-5 control-label">Género</label>
        <div class="col-md-7">
          <label class="col-md-7 control-label">{{$documento->boleta->cliente->sexo}}</label>
        </div>
      </div>

      <div class="form-group col-md-12">
        <label class="col-md-5 control-label">Ciudad</label>
        <div class="col-md-7">
          <label class="col-sm-7 control-label">@if($documento->boleta->cliente->ciudad != null) {{$documento->boleta->cliente->ciudad->nom_ciudad}} @endif</label>
        </div>
      </div>
      
      <div class="form-group col-md-12">
        <label class="col-md-5 control-label">Dirección</label>
        <div class="col-md-7">
          <label class="col-sm-7 control-label">{{$documento->boleta->cliente->direccion}}</label>
        </div>
      </div>


      <div class="form-group col-md-12">
        <label class="col-md-5 control-label">Email</label>
        <div class="col-md-7">

          <label class="col-md-7 control-label">{{$documento->boleta->cliente->mail}}</label>
        </div>
      </div>

      <div class="form-group col-md-12">
        <label class="col-md-5 control-label">Fono</label>
        <div class="col-md-7">

          <label class="col-md-7 control-label">{{$documento->boleta->cliente->fono}}</label>
        </div>
      </div>

            
      <div class="form-group col-md-12">
        <label class="col-md-5 control-label">Método de envío</label>
        <div class="col-md-7">
          <h3 class="col-sm-10 control-label hPrecio">{{$documento->boleta->metodo_nombre}}</h3>
        </div>
      </div>
      
    </div>
  </div>

<h3>Productos pedidos</h3>
  <hr>
  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="detalleTable" width="100%">
      <thead align="center">
        <th>ID producto</th>
        <th>Nombre</th>
        <th>Proveedor</th>
        <th>Stock</th>
        <th>Precio unitario</th>
        <th>Cantidad Pedida</th>
        <th>Subtotal</th>
      </thead>
      <tbody>
      </tbody>
    </table>

  </div>

  <hr>
  <div class="row ">
    <div class="form-group pull-right col-sm-9">
      <label class="col-sm-5 control-label">Cantidad</label>
      <div class="col-sm-4">
        <div class="pull-right">
          <input type="text" name="cantidadTotal" class="form-control" readonly >
        </div> 
      </div>
      <label class="col-sm-5 control-label">Subtotal Productos</label>
      <div class="col-sm-4">
        <div class="pull-right">
          <input type="text" name="subtotal" class="form-control" readonly >
        </div> 
      </div>
      <label class="col-sm-5 control-label">Envío</label>
      <div class="col-sm-4">
        <div class="pull-right">
          <input type="text" name="envio" class="form-control" value="+ {{$documento->boleta->metodoCostoF}}" readonly >
        </div> 
      </div>
      <label class="col-sm-5 control-label">Total a cobrar</label>
      <div class="col-sm-4">
        <div class="pull-right">
          <input type="text" name="total" class="form-control" readonly >
        </div> 
      </div>
    </div>
  </div>



  <hr>
  <div class="row ">
    <div class="col-sm-2 pull-left">
      <a href="/boleta/rechazarPedido/{{$documento->cod_documento}}"><button type="button" class="btn btn-danger">Rechazar pedido</button></a>
    </div>
    <div class="col-sm-2 pull-right">
      <a href="/venta/internet/{{$documento->cod_documento}}"><button type="button" class="btn btn-success">Pedido pagado</button></a>
    </div>
  </div>
</div>
@stop

@section('extra-js')
{{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
{{ HTML::script('js/detallePedido.js') }}
@stop()