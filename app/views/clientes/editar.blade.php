@section('content')        
        <!-- begin:product-content -->

						<div class="col-md-7 col-sm-7">
							<h3>{{$titulo}}</h3>
         
              <div class="row confirm">
                <div class="col-md-15">
                  <form class="form-horizontal" role="form" method="post" action="/cliente/editando/{{$cliente->rut}}" onlyread>

                    <hr>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Rut (*)</label>
                      <div class="col-sm-7">
                        <input type="text" name="rut"class="form-control" pattern="\d{3,8}-[\d|kK]{1}" placeholder="Rut : " value="{{$cliente->rut}}" o>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Nombre (*)</label>
                      <div class="col-sm-7">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre : " value="{{$cliente->nom_usuario}}" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Contraseña (*)</label>
                      <div class="col-sm-7">
                        <input type="password" nombre="pass"class="form-control" placeholder="******** " disabled>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Dirección (*)</label>
                      <div class="col-sm-7">
                        <input type="text" name="direccion"class="form-control" placeholder="Ej : " value="{{$cliente->direccion}}" required>
                      </div>
                    </div>

                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Ciudad (*)</label>
                      <div class="col-sm-7">
                        <select class="form-control" name="ciudad" required>
                          @foreach ($ciudad as $cdd)
                            <option value="{{ $cdd->cod_ciudad }}"
                                    @if ($cliente->cod_ciudad === $cdd->cod_ciudad)
                          selected 
                          @endif
                          >
                          {{$cdd->nom_ciudad}}
                          </option>
                          @endforeach
                        </select>
                      </div>
                    </div> 
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">fecha de nacimiento</label>
                      <div class="col-sm-7">
                        <input type="date" name="fnac"class="form-control" placeholder="Precio : " required value="{{$cliente->fecha_nacimiento}}">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Sexo</label>
                      <div class="col-sm-7">
                        <select class="form-control" name="sexo" required>
                          <option value="Femenino" @if($cliente->sexo == "femenino") selected  @endif >Femenino</option>
                          <option value="Masculino" @if($cliente->sexo == "masculino") selected @endif > Masculino</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Teléfono</label>
                      <div class="col-sm-7">
                        <input type="number" name="fono" class="form-control" placeholder="Precio : " value="{{$cliente->fono}}" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Correo electrónico</label>
                      <div class="col-sm-7">
                        <input type="mail" name="mail" class="form-control" placeholder="Precio : " value="{{$cliente->mail}}" required>
                      </div>
                    </div>

                    

                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-10">
                        <div class="pull-right">
                        <button type="submit" class="btn btn-purple">Editar</button>
                        </div>  
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

@stop