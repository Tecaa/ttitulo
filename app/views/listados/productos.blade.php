@section('extra-css')
    {{ HTML::style('assets/css/dataTables/jquery.dataTables.min.css') }}
@stop()


@section('content')

          	<!-- begin:heading -->
	<div class="heads" style="background: url(../img/img02.jpg) center center;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><span>//</span> Lista de Productos</h2>
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
				      <li class="active">Listado de Productos</li>
				    </ol>
				</div>
			</div>
			
			<div class="row">
						
        
        <!-- begin:product-content -->
        <div class="col-md-9 col-sm-9 single-item">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <h3>Ventas</h3>



              <table id="productosTable" class="display" cellspacing="0" width="100%">
              </table>

            </div>
          </div>
          <!-- end:pricing -->


                  
    
    </div>
</div>

@stop
      
@section('extra-js')
  {{ HTML::script('assets/js/dataTables/jquery.dataTables.min.js') }}
  {{ HTML::script('assets/js/listadoProductos.js') }}
@stop()