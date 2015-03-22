@section('content')

<!-- begin:content -->
	<div class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
				      <li><a href="#">Inicio</a></li>
				      <li class="active">Vendedor</li>
				    </ol>
				</div>
			</div>
			
      @include('compartidos.vendedorMenu')
      
			<div class="row">
				
          <!-- begin:product-content -->
				<div class="col-md-8 col-sm-8 single-item">
					<div class="row">
						<div class="col-md-8 col-sm-8">
							<h3>Sesión vendedor</h3>
              Elija una opción del menú para comenzar
						</div>
					</div>
			
			</div>
		</div>
	</div>
@stop