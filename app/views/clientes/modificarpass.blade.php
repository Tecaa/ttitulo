@section('content')        
        <!-- begin:product-content -->

						<div class="col-md-7 col-sm-7">
							<h3>{{$titulo}}</h3>
         
              <div class="row confirm">
                <div class="col-md-15">
                  <form class="form-horizontal" role="form" method="post" action="/micuenta/modificar/pass" onlyread>

                    <hr>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Contraseña actual</label>
                      <div class="col-sm-7">
                        <input type="password" name="pass"class="form-control">
                      </div>
                    </div>
                    
                    <hr>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Nueva Contraseña</label>
                      <div class="col-sm-7">
                        <input type="password" name="nueva" class="form-control">
                      </div>
                    </div>
                    
                    
                    <hr>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Nueva Contraseña</label>
                      <div class="col-sm-7">
                        <input type="password" name="nueva2"class="form-control">
                      </div>
                    </div>


                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-10">
                        <div class="pull-right">
                        <button type="submit" class="btn btn-purple">Modificar</button>
                        </div>  
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

@stop