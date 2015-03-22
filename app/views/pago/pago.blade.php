@section('content')
<div class="col-md-7 col-sm-7">
  <h3>Pago Pedido</h3>

  <div class="row confirm">
    <div class="col-md-15">
      <form class="form-horizontal" role="form" >


        <div class="form-group">
          <label class="col-sm-5 control-label">Banco (*)</label>
          <div class="col-sm-7">
            <select class="form-control" name="banco" required>
              @foreach ($banco as $banc)
              <option value="{{ $banc->cod_banco }}">{{ $banc->nom_banco}}</option>
              @endforeach
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Monto (*)</label>
          <div class="col-sm-7">
            <input type="number" name="monto" class="form-control" placeholder="Ej: 20000" required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Fecha (*)</label>
          <div class="col-sm-7">
            <input type="number" name="fecha" class="form-control" placeholder="Ej.: DD/MM/AAAA " required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Tipo Pago (*)</label>
          <div class="col-sm-7">
            <select class="form-control" name="tipo" required>
              <option value="deposito" id="dan">Depósito</option>
              <option value="efectivo" id="devuelto">Efectivo</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5 control-label">N° productos (*)</label>
          <div class="col-sm-7">
            <input type="number" name="cantidad" class="form-control" placeholder="Ej.: 3 " required>
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
              <button type="submit" id="ingresar"class="btn btn-purple">Ingresar</button>
            </div>  
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@stop