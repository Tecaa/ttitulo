@section('content')

        <!-- begin:product-content -->
						<div class="col-md-7 col-sm-7">
							<h3>{{$titulo}}</h3>
         
              <div class="row confirm">
                <div class="col-md-15">
                  <form class="form-horizontal" role="form" action="/cliente/creando" method="POST">

                    <hr>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Rut (*)</label>
                      <div class="col-sm-7">
                        <input type="text" name="rut" class="form-control" pattern="\d{3,8}-[\d|kK]{1}" placeholder="Ej.: 11222333-k " required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Nombre (*)</label>
                      <div class="col-sm-7">
                        <input type="text" name="nombre" class="form-control" placeholder="Ej.: Nombre Apellido " required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Contraseña (*)</label>
                      <div class="col-sm-7">
                        <input type="password" name="pass" class="form-control" placeholder="******** " required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Ciudad (*)</label>
                      <div class="col-sm-7">
                        <select class="form-control" name="ciudad" required>
                         @foreach ($ciudad as $cdd)
                            <option value="{{ $cdd->cod_ciudad }}">{{ $cdd->nom_ciudad}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>   
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Dirección (*)</label>
                      <div class="col-sm-7">
                        <input type="text" name="direccion" class="form-control" placeholder="Ej.: Los Maitenes 1400 " required>
                      </div>
                    </div>
                 

                    <div class="form-group">
                      <label class="col-sm-5 control-label">fecha de nacimiento</label>
                      <div class="col-sm-7">
                        <input type="date" name="fnac"class="form-control" placeholder="DD/MM/AA : " required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Sexo</label>
                      <div class="col-sm-7">
                        <select class="form-control" name="sexo" required>
                          <option value="Femenino">Femenino</option>
                          <option value="Masculino">Masculino</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Teléfono (*)</label>
                      <div class="col-sm-7">
                        <input type="number" name="fono" class="form-control" placeholder="Ej.: 90909090 " required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Correo electrónico (*)</label>
                      <div class="col-sm-7">
                        <input type="email" name="mail" class="form-control" placeholder="Ej.: micorreo@correo.com " required>
                      </div>
                    </div>

                    

                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-10">
                        <div class="pull-right">
                        <button type="submit" class="btn btn-purple">Crear</button>
                        </div>  
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

@stop