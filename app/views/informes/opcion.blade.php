@section('content')

        
        <!-- begin:product-content -->
				<div class="col-md-9 col-sm-9 single-item">
					<div class="row">
						<div class="col-md-7 col-sm-7">
							<h3>Informes</h3>
         
              <div class="row confirm">
                <div class="col-md-15">
                  <form class="form-horizontal" role="form">


                    <div class="form-group">
                      <label class="col-sm-5 control-label">Tipo informe</label>
                      <div class="col-sm-7">
                        <select class="form-control" name="ciudad" required>
                          <option value="nomCiudad">Ventas</option>
                          <option value="tipoAj">Compras</option>
                        </select>
                      </div>
                    </div>
                    
                                        <div class="form-group">
                      <label class="col-sm-5 control-label">Periodo de tiempo</label>
                      <div class="col-sm-7">
                        <select class="form-control" name="ciudad" required>
                          <option value="nomCiudad">Diario</option>
                          <option value="tipoAj">Mensual</option>
                          <option value="tipoAj">Anual</option>
                        </select>
                      </div>
                    </div>


                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-10">
                        <div class="pull-right">
                        <button type="submit" class="btn btn-purple">Generar</button>
                        </div>  
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


	

    </div>
</div>

@stop