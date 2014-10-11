@section('content')

          	<!-- begin:heading -->
	<div class="heads" style="background: url(../img/img02.jpg) center center;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><span>//</span> Eliminar producto</h2>
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
				      <li class="active">Eliminar producto</li>
				    </ol>
				</div>
			</div>
			
			<div class="row">
						
        <!-- begin:product-sidebar -->
				<div class="col-md-3 col-sm-3">
					<div class="row sidebar">
						<div class="col-md-12">
								
							<h3>Menú</h3>
							<ul class="nav nav-pills nav-stacked">
                      
              <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mantenedores <i class="fa fa-caret-down icon-dropdown"></i></a>
              <ul class="dropdown-menu sub-menu">
                  <li><a href="product.html">Productos</a></li>
                  <li><a href="product.html">Categorías</a></li>
                  <li><a href="product.html">Laboratorios</a></li>
                  <li><a href="product.html">Vendedores</a></li>
                  <li><a href="product.html">Clientes</a></li>
                  <li><a href="product.html">Proveedorea</a></li>
                  <li><a href="product.html">Bancos</a></li>
                  <li><a href="product.html">Ciudades</a></li>
                  <li><a href="product.html">Regiones</a></li>
              </ul>
              </li>

              <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Listados <i class="fa fa-caret-down icon-dropdown"></i></a>
              <ul class="dropdown-menu sub-menu">
                  <li><a href="product.html">Productos</a></li>
                  <li><a href="product.html">Ventas</a></li>
                  <li><a href="product.html">Stock</a></li>

              </ul>
              </li>

                    <li><a href="product.html">Ventas</a></li>
                    <li><a href="product.html">Compras</a></li>
                    <li><a href="product.html">Stock</a></li>
                    <li><a href="product.html">Informes</a></li>
                    <li><a href="product.html">Ajustes</a></li>
                    <li><a href="product.html">Agenda proveedores</a></li>
                  </ul>

                  
                </div>
              </div>
            </div>
				<!-- end:product-sidebar -->
        
        <!-- begin:product-content -->
				<div class="col-md-9 col-sm-9 single-item">
					<div class="row">
						<div class="col-md-7 col-sm-7">
							<h3>Eliminar producto</h3>
         
              <div class="row confirm">
                <div class="col-md-15">
                  <form class="form-horizontal" role="form">

                    <hr>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Código producto</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Codigo : " required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Nombre producto</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Nombre : " required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Laboratorio</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Laboratorio : " required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Cantidad</label>
                      <div class="col-sm-7">
                        <input type="email" class="form-control" placeholder="Email address : " required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Precio</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Precio : " required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Subir imágen</label>
                      <div class="col-sm-7">
                        <input type="file" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" class="btn btn-purple">Eliminar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        

    
    </div>
</div>

@stop