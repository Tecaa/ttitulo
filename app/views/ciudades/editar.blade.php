@section('content')        
        <!-- begin:product-content -->

	<div class="col-md-7 col-sm-7">
	<h3>{{$titulo}}</h3>
         
    <div class="row confirm">
      <div class="col-md-15">
        <form class="form-horizontal" role="form" method="post" action="/ciudades/editando/{{$ciudades->cod_ciudad}}">


                    <hr>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">Código ciudad</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" placeholder="Código : " value="{{$ciudades->cod_ciudad}}" disabled>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-5 control-label">Nombre ciudad (*)</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="nombre" value="{{$ciudades->nom_ciudad}}" placeholder="Ej.: Valparaíso" required>
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