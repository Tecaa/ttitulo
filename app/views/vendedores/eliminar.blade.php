@section('content')
        
        <!-- begin:product-content -->
						<div class="col-md-7 col-sm-7">
							<h3>{{$titulo}}</h3>
         
              <div class="row confirm">
                <div class="col-md-15">
                  <form class="form-horizontal" role="form">

                    <hr>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Rut</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Rut : " required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Nombre</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Nombre : " required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Contraseña</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="********** : " required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Dirección</label>
                      <div class="col-sm-7">
                        <input type="email" class="form-control" placeholder="Email address : " required>
                      </div>
                    </div>

                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Ciudad</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Precio : " required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">fecha de nacimiento</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Precio : " required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Sexo</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Precio : " required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Teléfono</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Precio : " required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Correo electrónico</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Precio : " required>
                      </div>
                    </div>

                    

                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" class="btn btn-purple">Eliminar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

@stop