@section('content')
        
        <!-- begin:product-content -->

						<div class="col-md-7 col-sm-7">
							<h3>{{$titulo}}</h3>
         
              <div class="row confirm">
                <div class="col-md-15">
                  <form class="form-horizontal" role="form" action="/vendedor/editando/{{$vendedor->rut}}" method="POST">

                    <hr>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Rut (*)</label>
                      <div class="col-sm-7">
                        <input type="text" name="rut"class="form-control" placeholder="Rut : " value="{{$vendedor->rut}}" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Nombre (*)</label>
                      <div class="col-sm-7">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre : "  value="{{$vendedor->nom_usuario}}" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Contraseña (*)</label>
                      <div class="col-sm-7">
                        <input type="password" name="pass"class="form-control" placeholder="********** " value="{{$vendedor->contrasena}}" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Dirección (*)</label>
                      <div class="col-sm-7">
                        <input type="text" name="direccion"class="form-control" placeholder="Dirección : " value="{{$vendedor->direccion}}" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Ciudad (*)</label>
                      <div class="col-sm-7">
                        <select class="form-control" name="ciudad" required>
                          @foreach ($ciudad as $cdd)
                            <option value="{{ $cdd->cod_ciudad }}"
                                    @if ($vendedor->cod_ciudad === $cdd->cod_ciudad)
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
                      <label class="col-sm-5 control-label">fecha de nacimiento (*)</label>
                      <div class="col-sm-7">
                        <input type="date" name="fnac" class="form-control" placeholder="DD/MM/AAAA : " value="{{$vendedor->fecha_nacimiento}}" required>
                      </div>
                    </div>
                    
                                       <div class="form-group">
                      <label class="col-sm-5 control-label">Sexo (*)</label>
                      <div class="col-sm-7">
                        <select class="form-control" name="sexo" required>
                          <option value="Femenino" @if($vendedor->sexo == "femenino") selected  @endif >Femenino</option>
                          <option value="Masculino" @if($vendedor->sexo == "masculino") selected @endif > Masculino</option>
                        </select>
                      </div>
                    </div>
                    
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Teléfono (*)</label>
                      <div class="col-sm-7">
                        <input type="number" name="fono"class="form-control" placeholder="Teléfono : " value="{{$vendedor->fono}}" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Correo electrónico (*)</label>
                      <div class="col-sm-7">
                        <input type="email" name="mail"class="form-control" placeholder="Ej.:micorreo@algo.com " value="{{$vendedor->mail}}" required>
                      </div>
                    </div>


                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" class="btn btn-purple">Editar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

@stop