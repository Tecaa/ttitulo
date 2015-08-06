@section('content')

<!-- begin:content -->
	<div class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
				      <li><a href="#">Inicio</a></li>
				      <li class="active">Iniciar Sesión</li>
				    </ol>
				</div>
			</div>
			
			<div class="row">
						
        
        
        <!-- begin:product-content -->
				<div class="col-md-9 col-sm-9 single-item">
					<div class="row">
						<div class="col-md-7 col-sm-7">
							<h3>Iniciar Sesión</h3>
         
              <div class="row confirm">
                <div class="col-md-15">
                  <form class="form-horizontal" role="form" action="/logeando" method="POST">

                    <hr>
                     @if (Session::get("message"))
                    <div class="alert alert-success">
                      {{ Session::get("message") }}
                    </div>
                    @endif
                    
                      @if ($errors->count() > 0)
                    <div class="alert alert-danger">
                      {{ $errors->first() }}
                    </div>
                    @endif
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Rut sin puntos y con guión (*)</label>
                      <div class="col-sm-7">
                        <input type="text" name="usuario" class="form-control" pattern="\d{3,8}-[\d|kK]{1}" placeholder="Rut : " required>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Contraseña</label>
                      <div class="col-sm-7">
                        <input type="password" name="pass" class="form-control" placehlsolder="***** " required>
                      </div>
                    </div>
                  
                     
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-10">
                        <div class="pull-right">
                          
                        <button type="submit" class="btn btn-purple">Ingresar</button>
                               
                        </div>  
                      </div>
                    </div>
                  </form>
                  <div>¿No tienes una cuenta? <a href="/cliente/registrarse" >Regístrate ahora</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        

    
    </div>
</div>

@stop