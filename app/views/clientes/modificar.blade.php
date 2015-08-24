@section('extra-css')
  {{ HTML::style('js/jQuery-ui/jquery-ui.min.css') }}
{{ HTML::style('js/jQuery-ui/jquery-ui.theme.min.css') }}
@stop()

@section('content')        
        <!-- begin:product-content -->

						<div class="col-md-7 col-sm-7">
							<h3>{{$titulo}}</h3>
         
              <div class="row confirm">
                <div class="col-md-15">
                  <form class="form-horizontal" role="form" method="post" action="/micuenta/modificando" onlyread>

                    <hr>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Rut (*)</label>
                      <div class="col-sm-7">
                        <input type="text" name="rut" class="form-control" pattern="\d{3,8}-[\d|kK]{1}" placeholder="Rut : " value="{{$user->rut}}" 
                               @if ($user->rut != null)
                               disabled
                                @endif
                        required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Nombre y apellido (*)</label>
                      <div class="col-sm-7">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre : " value="{{$user->nom_usuario}}" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Dirección (Opcional)</label>
                      <div class="col-sm-7">
                        <input type="text" name="direccion"class="form-control" placeholder="Ej : " value="{{$user->direccion}}">
                      </div>
                    </div>

                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Ciudad (*)</label>
                      <div class="col-sm-7">
                        <select class="form-control" name="ciudad" required>
                          @foreach ($ciudad as $cdd)
                            <option value="{{ $cdd->cod_ciudad }}"
                                    @if ($user->cod_ciudad === $cdd->cod_ciudad)
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
                      <label class="col-sm-5 control-label">Fecha de nacimiento (*)</label>
                      <div class="col-sm-7">
                        <input type="text" id="datepicker" class="form-control" placeholder="DD/MM/AAAA : " value="{{$user->fechaNacimientoF}}" required>
                        <input type="hidden" name="fnac" id="fnac" value="{{ $user->fecha_nacimiento }}" required> 
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Sexo</label>
                      <div class="col-sm-7">
                        <select class="form-control" name="sexo" required>
                          <option value="Femenino" @if($user->sexo == "femenino") selected  @endif >Femenino</option>
                          <option value="Masculino" @if($user->sexo == "masculino") selected @endif > Masculino</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      Datos de contacto, por favor rellénelos para poder contactarlo cuando haga sus compras.
                    </div>
                    <hr>


                    <div class="form-group">
                      <label class="col-sm-5 control-label">Teléfono</label>
                      <div class="col-sm-7">
                        <input type="number" name="fono" class="form-control" placeholder="Precio : " value="{{$user->fono}}" required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Correo electrónico</label>
                      <div class="col-sm-7">
                        <input type="mail" name="mail" class="form-control" placeholder="Precio : " value="{{$user->mail}}" required>
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


@section('extra-js')
  {{ HTML::script('js/jQuery-ui/jquery-ui.min.js') }}
  {{ HTML::script('js/jQuery-ui/jquery-ui-es.js') }}

<script>
  $(function() {
    $( "#datepicker" ).datepicker({
      dateFormat: "dd/mm/yy",
      altFormat: "yy-mm-dd",
      altField: "#fnac",
      changeMonth: true,
      changeYear: true,
      yearRange: "-100:c"
      //showOn: "button",
     // buttonImage: "images/calendar.gif",
     // buttonImageOnly: true,
     // buttonText: "Select date"
    });
  });
</script>

@stop()