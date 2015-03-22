@section('content')

<div class="col-md-7 col-sm-7">
  <h3>{{$titulo}}</h3>

  <div class="row confirm">
    <div class="col-md-15">
      <form class="form-horizontal" role="form" method="post" action="/categorias/editando/{{$categoria->cod_categoria}}">

        <hr>
        <div class="form-group">
          <label class="col-sm-5 control-label">Código categoría</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" placeholder="Codigo : " value="{{$categoria->cod_categoria}}" disabled>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5 control-label">Nombre categoría  (*)</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="nombre" pattern="[A-Za-z| |ñ|Ñ|á|é|í|ó|ú|Á|É|Í|Ó|Ú]*" placeholder="Nombre : " value="{{$categoria->nom_categoria}}" required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5 control-label">Descripción  </label>
          <div class="col-sm-7">
            <input type="textarea" class="form-control" name="descripcion" pattern="[A-Za-z| |ñ|Ñ|á|é|í|ó|ú|Á|É|Í|Ó|Ú]*" placeholder="Ej.: Alivie su gripe naturalmente en este invierno." value="{{ $categoria->descripcion }}" >
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