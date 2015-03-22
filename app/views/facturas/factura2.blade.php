@section('content')

@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()

<div class="col-md-9 col-sm-9">
  <h3>Compra </h3>
  <div class="row confirm">
    <div class="col-md-15">
      <form class="form-horizontal" role="form" action="/producto/creando" method="POST">

        <hr>
        <div class="form-group">
          <label class="col-sm-5 control-label">Rut Proveedor</label>
          <div class="col-sm-7">
            <input type="text" name="rutProveedor" class="form-control" placeholder="Rut : " required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Nombre Proveedor</label>
          <div class="col-sm-7">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre : " required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Código Factura</label>
          <div class="col-sm-7">
            <input type="text" name="codFactura" class="form-control" placeholder="Código Factura : " required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Fecha</label>
          <div class="col-sm-7">
            <input type="date" name="fecha" class="form-control" placeholder="Fecha: " required>
          </div>
        </div>
        
        <h3>Datos Compra</h3>
        <div class="form-group">
          <label class="col-sm-5 control-label">Código de barras</label>
          <div class="col-sm-7">
            <input type="text" name="codigoB" class="form-control" placeholder="Codigo : " required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5 control-label">Cantidad</label>
          <div class="col-sm-7">
            <input type="number" name="cantidad" class="form-control" placeholder="Cantidad : " required>
          </div>
        </div>

                <div class="form-group">
          <label class="col-sm-5 control-label">Precio</label>
          <div class="col-sm-7">
            <input type="number" name="precio" class="form-control" placeholder="Cantidad : " required>
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-10">
            
            <div class="pull-right">
            <button type="submit" class="btn btn-purple">Ingresar</button>
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
        <th>SubTotal</th>
        <th>Acción</th>
      </thead>
      <tbody>
        <tr>
          <td>Paltomiel</td>
          <td>Knop</td>
          <td>20</td>
          <td>1500</td>
          <td>30000</td>
          <td>Eliminar</td>
        </tr>
        <tr>
           <td>Vitamina C</td>
           <td>Knop</td>
           <td>15</td>
           <td>700</td>
           <td>10500</td>
           <td></td>
        </tr>
      </tbody>
    </table>
    
     <div class="form-group">
          <label class="col-sm-5 control-label">Total</label>
          <div class="col-sm-7">
            <div class="pull-right">
            <input type="number" name="cantidad" class="form-control" required>
            </div> 
          </div>
      </div>
    
     <div class="form-group">
          <div class="col-sm-offset-3 col-sm-10">
            <br> <br>
            <div class="pull-right">
            <button type="submit" class="btn btn-purple">Ingresar</button> 
            </div>  
          </div>
        </div>
    
  </div>
</div>

@stop

@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/factura.js') }}
@stop()

