@section('content')        
        <!-- begin:product-content -->

						<div class="col-md-7 col-sm-7">
							<h3>{{$titulo}}</h3>
         
              <div class="row confirm">
                <div class="col-md-15">
                  <form class="form-horizontal" role="form" action="/cliente/micuenta/{{$cliente->rut}}" method="post"  disabled>

                    <hr>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Rut :</label>
                      <label class="col-sm-5 control-label">{{$cliente->rut}}</label>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label">Nombre :</label>
                        <label class="col-sm-5 control-label"> {{$cliente->nom_usuario}} </label>
                      </div>
                    


                    <div class="form-group">
                        <label class="col-sm-5 control-label">Dirección :</label>
                        <label class="col-sm-5 control-label"> {{$cliente->direccion}} </label>
                    </div>
                    
                    <!--
                    <div class="form-group">
                        <label class="col-sm-5 control-label">Ciudad :</label>
                        <label class="col-sm-5 control-label">  
                          
                           </label>
                    </div> -->
                    
                    <div class="form-group">
                      
                      <label class="col-sm-5 control-label">Ciudad </label>
                        <label class="col-sm-5 control-label">@if($cliente->ciudad != null) {{$cliente->ciudad->nom_ciudad}} @endif</label>
                    </div>  
                    
                    
                    <div class="form-group">
                        <label class="col-sm-5 control-label">Fecha de nacimiento :</label>
                        <label class="col-sm-5 control-label">{{$cliente->FechaNacimientoF}} </label>
                    </div>
                    
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Sexo :</label>
                        <label class="col-sm-5 control-label">{{$cliente->sexo}} </label>
                    </div>
                    
                    
                    <!--
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Sexo</label>
                      <div class="col-sm-7">
                        <select class="form-control" name="sexo" disabled>
                          <option value="Femenino" @if($cliente->sexo == "femenino") selected  @endif >Femenino</option>
                          <option value="Masculino" @if($cliente->sexo == "masculino") selected @endif > Masculino</option>
                        </select>
                      </div>
                    </div>
-->
                   
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Teléfono :</label>
                        <label class="col-sm-5 control-label">{{$cliente->fono}} </label>
                    </div>
                    
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Correo electrónico :</label>
                        <label class="col-sm-5 control-label">{{$cliente->mail}} </label>
                    </div>
                    </div>

                   <br> <br>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="/micuenta/modificar" role="button">Modificar datos</a>
                    </div>
                    
                    
                  </form>
                </div>
              </div>
            </div>

@stop