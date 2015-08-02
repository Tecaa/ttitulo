@section('content')
        
        <!-- begin:product-content -->
						<div class="col-md-7 col-sm-7">
							<h3>{{$titulo}}</h3>
         
              <div class="row confirm">
                <div class="col-md-15">
                  <form class="form-horizontal" role="form" method="post" action="/proveedores/editando/{{$proveedor->cod_proveedor}}">

                    <hr>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Código proveedor (*)</label>
                      <div class="col-sm-7">
                        <input type="text" name="cod" class="form-control" placeholder="Rut :" value="{{$proveedor->cod_proveedor}}"  readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Nombre (*)</label>
                      <div class="col-sm-7">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre : " value="{{$proveedor->nom_proveedor}}" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Dirección (*)</label>
                      <div class="col-sm-7">
                        <input type="text" name="direccion" class="form-control" placeholder="Dirección : " value="{{$proveedor->direccion_prov}}" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Ciudad (*)</label>
                      <div class="col-sm-7">
                        <select class="form-control" name="ciudad" required>
                          @foreach ($ciudad as $cdd)
                            <option value="{{ $cdd->cod_ciudad }}"
                                    @if ($proveedor->cod_ciudad === $cdd->cod_ciudad)
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
                      <label class="col-sm-5 control-label">Teléfono</label>
                      <div class="col-sm-7">
                        <input type="number" name="fono"class="form-control" placeholder="Teléfono : " value="{{$proveedor->fono_prov}}">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Correo electrónico</label>
                      <div class="col-sm-7">
                        <input type="email" name="mail"class="form-control" placeholder="Correo electrónico : " value="{{$proveedor->mail_prov}}">
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