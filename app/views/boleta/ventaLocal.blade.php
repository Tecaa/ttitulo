@section('content')

@section('extra-css')
    {{ HTML::style('css/dataTables/jquery.dataTables.min.css') }}
@stop()

<div class="col-md-9 col-sm-9">
  <h3>Venta </h3>

  <div class="row confirm">
    <div class="col-md-15">
      <form class="form-horizontal" role="form" action = "/venta/local/crear" method="post">

        <hr>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Cantidad (*)</label>
          <div class="col-sm-7">
            <input type="number" name="cantidad" class="form-control" min=1 value=1 max=100 required> 
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-5 control-label">Código de barras (*)</label>
          <div class="col-sm-7">
            <input type="text" pattern="[0-9]*" name="codigoB" class="form-control" onKeyPress="return submitenter(this,event)" required> 
          </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-10">
            
            <div class="pull-right">
            <button type="button" class="btn btn-purple" id="ingresar" name="ingresar">Ingresar</button>
              <br><br>
            </div> 
          </div>
        </div>
      </form>

    </div>
  </div>
  
  <h3>Detalle venta</h3>
  <div id="table-responsive" class="table-responsive">
    <table class="table table-bordered table-hover" id="boletaTable" width="100%">
      <thead align="center">

        <th>Nombre Producto</th>
        <th>Laboratorio</th>
        <th>Stock</th>
        <th>Precio</th>
        <th>Cantidad</th>
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
            <input type="text" name="cantidadTotal" class="form-control" readonly >
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
            <button type="submit" class="btn btn-purple" id="venta" name="venta">Realizar Venta</button> 
            </div>  
          </div>
        </div>
    
  </div>
</div>


@stop
      
@section('extra-js')
  {{ HTML::script('js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('js/boleta.js') }}
@stop()