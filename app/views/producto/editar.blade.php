@section('content')

          	<!-- begin:heading -->
	<div class="heads" style="background: url(../img/img02.jpg) center center;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><span>//</span> Editar producto</h2>
				</div>
			</div>
		</div>
	</div>
	<!-- end:heading -->

<!-- begin:content -->
	<div class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
				      <li><a href="#">Home</a></li>
				      <li class="active">Editar producto</li>
				    </ol>
				</div>
			</div>
			
			<div class="row">
				@yield('menu')
        
        <!-- begin:product-content -->
				<div class="col-md-9 col-sm-9 single-item">
					<div class="row">
						<div class="col-md-7 col-sm-7">
							<h3>Editar producto</h3>
         
              <div class="row confirm">
                <div class="col-md-15">
                  <form class="form-horizontal" role="form">

                    <hr>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Código de barras</label>
                      <div class="col-sm-7">
                        <input type="text" name="codigoB" class="form-control" placeholder="Codigo : " required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Nombre producto</label>
                      <div class="col-sm-7">
                        <input type="text" name="nombre"class="form-control" placeholder="Nombre : " required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Laboratorio</label>
                      <div class="col-sm-7">
                        <select class="form-control" name="laboratorio" required>
                          @foreach ($labs as $lab)
                          <option value="{{ $lab->cod_laboratorio }}">{{ $lab->nom_laboratorio}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Cantidad</label>
                      <div class="col-sm-7">
                        <input type="number" name="cantidad"class="form-control" placeholder="Email address : " required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Precio</label>
                      <div class="col-sm-7">
                        <input type="number" name="precio" class="form-control" placeholder="Precio : " required>
                      </div>
                    </div>
                    

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Subir imágen</label>
                      <div class="col-sm-7">
                        <input type="file" name="imagen" class="form-control">
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
            
            <div class="col-md-3 col-sm-3">
              <div id="itemsingle" class="carousel slide clearfix">

                <div class="carousel-inner">
                  <div class="item active">
                    {{ HTML::image("img/manuk.jpg", "Logo") }}
                  </div>
                  <div class="item">
                    {{ HTML::image("img/manuk.jpg", "Logo") }}
                  </div>
                  <div class="item">
                    {{ HTML::image("img/manuk.jpg", "Logo") }}
                  </div>
                </div>

                <ol class="carousel-indicators">
                  <li data-target="#itemsingle" data-slide-to="0" class="active">{{ HTML::image("img/manuk.jpg", "Foto 1", array('class' => 'img-responsive'))  }}</li>
                  <li data-target="#itemsingle" data-slide-to="1" class="">{{ HTML::image("img/manuk.jpg", "Foto 2", array('class' => 'img-responsive'))  }}></li>
                  <li data-target="#itemsingle" data-slide-to="2" class="">{{ HTML::image("img/manuk.jpg", "Foto 3", array('class' => 'img-responsive'))  }}
                </ol>
              </div>


            
          </div>
        </div>
      </div>
        

    
    </div>
</div>

@stop