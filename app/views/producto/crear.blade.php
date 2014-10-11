@section('content')

          	<!-- begin:heading -->
	<div class="heads" style="background: url(../img/img02.jpg) center center;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><span>//</span> Crear producto</h2>
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
				      <li class="active">Crear producto</li>
				    </ol>
				</div>
			</div>
			
			<div class="row">
        @yield('menu')
        
        <!-- begin:product-content -->
				<div class="col-md-9 col-sm-9 single-item">
					<div class="row">
						<div class="col-md-7 col-sm-7">
							<h3>Crear producto</h3>
         
              <div class="row confirm">
                <div class="col-md-15">
                  <form class="form-horizontal" role="form" action="/producto/creando">

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
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre : " required>
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
                        <input type="number" name= "cantidad" class="form-control" placeholder="Cantidad : " required>
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
                        <button type="submit" class="btn btn-purple">Crear</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


	
      <!-- begin:content -->
      <div class="page-content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

            </div>
          </div>



      <!-- begin:product-sidebar -->
      <div class="col-md-3 col-sm-3">
        <div class="row sidebar">
          <div class="col-md-12">
            <h3>Quick Search</h3>
            <div class="quick-search">
              <h5>Select Category</h5>
              <select name="cat" class="form-control">
                <option value="Canary">Canary</option>
                <option value="Emprit">Emprit</option>
                <option value="Parkit">Parkit</option>
                <option value="Doro">Doro</option>
                <option value="Pitik">Pitik</option>
                <option value="Jalak">Jalak</option>
                <option value="Cucak Rowo">Cucak Rowo</option>
                <option value="Gemak">Gemak</option>
                <option value="Deruk">Deruk</option>
                <option value="Kutut">Kutut</option>
                <option value="Tilang">Tilang</option>
              </select>
              <h5>Select Color</h5>
              <select name="cat" class="form-control">
                <option value="Yellow">Yellow</option>
                <option value="Blue">Blue</option>
                <option value="Green">Green</option>
                <option value="Red">Red</option>
                <option value="Orange">Orange</option>
                <option value="Black">Black</option>
                <option value="Grey">Grey</option>
              </select>
              <h5>Select Min - Max Price</h5>
              <div class="col-md-6">
                <select name="cat" class="form-control">
                  <option value="Yellow">$10</option>
                  <option value="Blue">$45</option>
                  <option value="Green">$70</option>
                  <option value="Red">$125</option>
                  <option value="Orange">$200</option>
                  <option value="Black">$235</option>
                  <option value="Grey">$300</option>
                </select>
              </div>
              <div class="col-md-6">
                <select name="cat" class="form-control">
                  <option value="Yellow">$15</option>
                  <option value="Blue">$45</option>
                  <option value="Green">$70</option>
                  <option value="Red">$125</option>
                  <option value="Orange">$200</option>
                  <option value="Black">$235</option>
                  <option value="Grey">$300</option>
                </select>
              </div>
              <input type="submit" class="btn btn-purple btn-block" name="submit" value="Search">
            </div>

            
        </div>
      </div>
      <!-- end:product-sidebar -->

    </div>
</div>

@stop