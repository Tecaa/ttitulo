@section('content')

@section('extra-css')
{{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()


<div class="col-md-9 col-sm-9">
  <h3>Detalle de la factura</h3>

  <div class="row confirm">
    <div class="col-md-15">
      <hr>
      <div class="form-group col-md-12">
        <label class="col-md-5 control-label">Proveedor</label>
        <div class="col-md-7">

          <label class="col-md-7 control-label">{{$documento->factura->proveedor->nom_proveedor}}</label>
        </div>
      </div>

      <div class="form-group col-md-12">
        <label class="col-md-5 control-label">Teléfono</label>
        <div class="col-md-7">

          <label class="col-md-7 control-label">{{$documento->factura->proveedor->fono_prov}}</label>
        </div>
      </div>

      <div class="form-group col-md-12">
        <label class="col-md-5 control-label">Email</label>
        <div class="col-md-7">
          <label class="col-md-7 control-label">{{$documento->factura->proveedor->mail_prov}}</label>
        </div>
      </div>

      <div class="form-group col-md-12">
        <label class="col-md-5 control-label">Ciudad</label>
        <div class="col-md-7">
          <label class="col-sm-7 control-label">@if($documento->factura->proveedor->ciudad != null) {{$documento->factura->proveedor->ciudad->nom_ciudad}} @endif</label>
        </div>
      </div>
      
      <div class="form-group col-md-12">
        <label class="col-md-5 control-label">Dirección</label>
        <div class="col-md-7">
          <label class="col-sm-7 control-label">{{$documento->factura->proveedor->direccion_prov}}</label>
        </div>
      </div>
    </div>
  </div>

<h3>Productos comprados</h3>
  <hr>
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

  <hr>
  <div class="row ">
    <div class="form-group pull-right col-sm-9">
      <label class="col-sm-5 control-label">Cantidad</label>
      <div class="col-sm-4">
        <div class="pull-right">
          <input type="text" name="cantidadTotal" class="form-control" readonly >
        </div> 
      </div>
      <label class="col-sm-5 control-label">Costo total</label>
      <div class="col-sm-4">
        <div class="pull-right">
          <input type="text" name="subtotal" class="form-control" readonly >
        </div> 
      </div>
    </div>
  </div>


<!--
  <hr>
  <div class="row ">
    <div class="col-sm-2 pull-left">
      <a href="/boleta/rechazarPedido/{{$documento->cod_documento}}"><button type="button" class="btn btn-danger">Rechazar pedido</button></a>
    </div>
    <div class="col-sm-2 pull-right">
      <a href="/venta/internet/{{$documento->cod_documento}}"><button type="button" class="btn btn-success">Pedido pagado</button></a>
    </div>
  </div>
-->
</div>
@stop

@section('extra-js')
{{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
{{ HTML::script('js/detalleFactura.js') }}
@stop()