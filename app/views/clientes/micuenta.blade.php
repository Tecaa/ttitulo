@section('content')        
        <!-- begin:product-content -->

						<div class="col-md-7 col-sm-7">
							<h3>{{$titulo}}</h3>
         
              <div class="row confirm">
                <div class="col-md-15">
                  <form class="form-horizontal" role="form" action="/cliente/micuenta/{{$cliente->rut}}" method="post"  disabled>

                    <hr>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Rut </label>
                      
                      <label class="col-sm-7 control-label">{{$cliente->rut}}</label>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Nombre </label>
                      <div class="col-sm-7">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre : " value="{{$cliente->nom_usuario}}" disabled>
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="col-sm-5 control-label">Dirección </label>
                      <div class="col-sm-7">
                        <input type="text" name="direccion"class="form-control" placeholder="Ej : " value="{{$cliente->direccion}}" disabled>
                      </div>
                    </div>

                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Ciudad </label>
                      <div class="col-sm-7">
                        <select class="form-control" name="ciudad" disabled>
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
                        <input type="date" name="fnac"class="form-control" placeholder="Precio : " required value="{{$cliente->fecha_nacimiento}}" disabled>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Sexo</label>
                      <div class="col-sm-7">
                        <select class="form-control" name="sexo" disabled>
                          <option value="Femenino" @if($cliente->sexo == "femenino") selected  @endif >Femenino</option>
                          <option value="Masculino" @if($cliente->sexo == "masculino") selected @endif > Masculino</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Teléfono</label>
                      <div class="col-sm-7">
                        <input type="number" name="fono" class="form-control" placeholder="Precio : " value="{{$cliente->fono}}" disabled>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Correo electrónico</label>
                      <div class="col-sm-7">
                        <input type="mail" name="mail" class="form-control" placeholder="Precio : " value="{{$cliente->mail}}" disabled>
                      </div>
                    </div>

                   <br>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="/cliente/editar/{{$cliente->rut}}" role="button">Modificar datos</a>
                    </div>
                    
                    
                  </form>
                </div>
              </div>
            </div>

@stop