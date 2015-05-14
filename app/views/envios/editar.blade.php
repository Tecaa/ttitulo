@section('content')        
        <!-- begin:product-content -->

	<div class="col-md-7 col-sm-7">
	<h3>{{$titulo}}</h3>
         
    <div class="row confirm">
      <div class="col-md-15">
        <form class="form-horizontal" role="form" method="post" action="/envio/editando/{{$metodo->cod_metodo}}">


                    <hr>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Código Método</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Código : " value="{{$metodo->cod_metodo}}" disabled>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Nombre Método (*)</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="nombre" value="{{$metodo->nombre}}" placeholder="Ej.: Chilexpress" required>
                      </div>
                    </div>
          
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Costo (*)</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="costo" value="{{$metodo->costo}}" placeholder="Ej.: 2500" required>
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