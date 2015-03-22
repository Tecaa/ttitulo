@section('content')

<div class="col-md-9 col-sm-9">
  <h3>Orden de Compra </h3>

  <div class="row confirm">
    <div class="col-md-15">
      <form class="form-horizontal" role="form" action="/producto/creando" method="POST">

        <hr>
  
                <div class="form-group">
          <label class="col-sm-3 control-label">Fecha</label>
          <div class="col-sm-7">
            <input type="text" name="codigoB" class="form-control" placeholder="Codigo : " required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">Rut Cliente</label>
          <div class="col-sm-7">
            <input type="text" name="rutCliente" class="form-control" placeholder="Rut : " required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-3 control-label">Nombre</label>
          <div class="col-sm-7">
            <input type="text" name="codigoB" class="form-control" placeholder="Codigo : " required>
          </div>
        </div>
        
        
      </form>

    </div>
  </div>
  <h5>Detalle Venta</h5>
  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="ordenTable" width="100%">
      <thead align="center">

        <th>Nombre Producto</th>
        <th>Laboratorio</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>SubTotal</th>
        <th></th>
      </thead>
      <tbody>
        <tr>
          <td>Paltomiel</td>
          <td>Knop</td>
          <td>2</td>
          <td>1500</td>
          <td>3000</td>
          <td></td>
        </tr>
        <tr>
           <td>Propoleo Spray</td>
           <td>Knop</td>
           <td>1</td>
           <td>2500</td>
           <td>2500</td>
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

  </div>
</div>


@stop
