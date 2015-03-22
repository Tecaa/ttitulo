@section('content')
<div class="col-md-7 col-sm-7">
  <h3>Ajuste</h3>

  <div class="row confirm">
    <div class="col-md-15">
      <form class="form-horizontal" role="form"  action="/producto/ajustando/{{$producto->codigo_producto}}" method="POST">

        <hr>
        <div class="form-group">
          <label class="col-sm-5 control-label">Nombre producto (*)</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="Nombre : " value="{{$producto->nombre_producto}}" readonly>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5 control-label">Código de barras</label>
          <div class="col-sm-7">
            <input type="number" class="form-control" placeholder="Codigo : " value="{{$producto->codigo_barras}}" readonly>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5 control-label">Cantidad actual</label>
          <div class="col-sm-7">
            <input type="number" class="form-control" placeholder="Cantidad actual : " value="{{$producto->cantidad}}" readonly>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5 control-label">Tipo ajuste (*)</label>
          <div class="col-sm-7">
            <select class="form-control" name="tipo" required>
              <option value="dan" id="dan">Dañado</option>
              <option value="devuelto" id="devuelto">Devuelto</option>
              <option value="extra" id="extra">Extra</option>
              <option value="vencido" id="vencido">Vencido</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5 control-label">N° productos (*)</label>
          <div class="col-sm-7">
            <input type="number" name="cantidad" class="form-control" placeholder="Cantidad : " required>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-5 control-label">Descripción (*)</label>
          <div class="col-sm-7">
            <input type="text" name= "descripcion" class="form-control" placeholder="Descipción : " required>
          </div>
        </div>



        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-10">
            <div class="pull-right">
              <button type="submit" class="btn btn-purple">Ajustar</button>
            </div>  
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@stop