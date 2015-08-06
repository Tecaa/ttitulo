@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
    {{ HTML::style('js/jQuery-ui/jquery-ui.min.css') }}
    {{ HTML::style('js/jQuery-ui/jquery-ui.theme.min.css') }}

@stop()

@section('content')

<div class="col-md-9 col-sm-9">
  <h3>Compra </h3>
  <div class="row confirm">
    <div class="col-md-15">
      <form class="form-horizontal" role="form" action="/compra/factura/crear" method="POST">

        <hr>
         <div class="form-group">
          <label class="col-sm-5 control-label">Nombre Proveedor (*)</label>
          <div class="col-sm-7">
            <select class="form-control" id="proveedor" name="proveedor" required>
              @foreach ($proveedores as $prov)
              <option value="{{ $prov->cod_proveedor }}">{{ $prov->nom_proveedor}}</option>
              @endforeach
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Código Factura (*)</label>
          <div class="col-sm-7">
            <input type="text" name="codFactura" class="form-control" placeholder="Ej: 12345 " required>
          </div>
        </div>
        
        <!--
        <div class="form-group">
          <label class="col-sm-5 control-label">Fecha (*)</label>
          <div class="col-sm-7">
            <input type="date" name="fecha" class="form-control" placeholder="Fecha: " required>
          </div>
        </div>
-->
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Fecha compra (*)</label>
          <div class="col-sm-7">
            <input type="text" id="datepicker" class="form-control" placeholder="DD/MM/AAAA : " required>
            <input type="hidden" name="fecha" id="fnac" required> 
          </div>
        </div>

        
        <h3>Datos Compra</h3>
        <div class="form-group">
          <label class="col-sm-5 control-label">Código de barras (*)</label>
          <div class="col-sm-7">
            <input id="codigoB" type="text" name="codigoB" class="form-control" placeholder="Ej.: 112201 " required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5 control-label">Cantidad (*)</label>
          <div class="col-sm-7">
            <input id="cantidad" type="number" class="form-control" placeholder="Ej.: 3 " min=1 max=5000 value=1 required>
          </div>
        </div>
<!--
                <div class="form-group">
          <label class="col-sm-5 control-label">Precio (*)</label>
          <div class="col-sm-7">
            <input id="precio" type="number" name="precio" class="form-control" placeholder="Ej.: 3000 "required>
          </div>
        </div>
    -->    
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Precio de Compra(*)</label>
          <div class="col-sm-7">
            <input type="number" name="precio_compra" id="precio_compra" class="form-control" placeholder="Ej.: 2990 "  min=1 max=100000 required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Precio de Venta(*)</label>
          <div class="col-sm-7">
            <input type="number" name="precio_venta" id="precio_venta" class="form-control" placeholder="Ej.: 2990 " min=1 max=100000 required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Precio Oferta</label>
          <div class="col-sm-7">
            <input type="number" name="precio_venta_oferta" id="precio_venta_oferta" class="form-control" placeholder="(Opcional)" min=1 max=100000>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-10">
            <div class="pull-right">
            <button type="button" class="btn btn-purple" id="ingresar">Ingresar</button>
              <br><br>
            </div> 
          </div>
        </div>
      </form>

    </div>
  </div>
  <h5>Detalle Compra</h5>
  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="facturaTable" width="100%">
      <thead align="center">

        <th>Nombre Producto</th>
        <th>Laboratorio</th>
        <th>Cantidad</th>
        <th>Precio compra</th>
        <th>Precio venta</th>
        <th>Precio oferta</th>
        <th>SubTotal</th>
        <!--<th>Acción</th>-->
      </thead>
      <tbody>
      </tbody>
    </table>
    
      <div class="form-group pull-right col-sm-5">
       <label class="col-sm-5 control-label">Cantidad</label>
          <div class="col-sm-7">
            <div class="pull-right">
            <input type="text" name="cantidad" class="form-control" readonly >
            </div> 
          </div>
       
          <label class="col-sm-5 control-label">Total</label>
          <div class="col-sm-7">
            <div class="pull-right">
            <input type="text" name="total" class="form-control" readonly >
            </div> 
          </div>
      </div>
    
     <div class="form-group">
          <div class="col-sm-offset-3 col-sm-10">
            <br> <br>
            <div class="pull-right">
            <button type="submit" class="btn btn-purple" id="comprar" name="comprar">Ingresar Compra</button> 
            </div>  
          </div>
        </div>
    
  </div>
</div>

@stop

@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/factura.js') }}
  
  {{ HTML::script('js/jQuery-ui/jquery-ui.min.js') }}
  {{ HTML::script('js/jQuery-ui/jquery-ui-es.js') }}

<script>
  $(function() {
    $( "#datepicker" ).datepicker({
      dateFormat: "dd/mm/yy",
      altFormat: "yy-mm-dd",
      altField: "#fnac",
      changeMonth: true,
      changeYear: true,
      yearRange: "-100:c"
      //showOn: "button",
     // buttonImage: "images/calendar.gif",
     // buttonImageOnly: true,
     // buttonText: "Select date"
    });
  });
</script>

@stop()
