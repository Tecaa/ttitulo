@section('content')
<div class="col-md-7 col-sm-7">
  <h3>{{$titulo}}</h3>
  <div class="row confirm">
    <div class="col-md-15">
      <form class="form-horizontal" role="form" action="/producto/creando" method="POST">

        <hr>
        <div class="form-group">
          <label class="col-sm-5 control-label">Código de barras</label>
          <div class="col-sm-7">
            <input type="number" name="codigoB" class="form-control" placeholder="Ej.: 202030 ">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5 control-label">Nombre producto (*)</label>
          <div class="col-sm-7">
            <input type="text" name="nombre" class="form-control"  placeholder="Ej : Mi producto " required>
          </div>
        </div>


        <div class="form-group">
          <label class="col-sm-5 control-label">Laboratorio (*)</label>
          <div class="col-sm-7">
            <select class="form-control" name="laboratorio" required>
              @foreach ($labs as $lab)
              <option value="{{ $lab->cod_laboratorio }}">{{ $lab->nom_laboratorio}}</option>
              @endforeach
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Descripción </label>
          <div class="col-sm-7">
            <input type="text" name="descripcion" class="form-control" placeholder="Ej.: Producto para el cabello " >
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5 control-label">Precio (*)</label>
          <div class="col-sm-7">
            <input type="number" name="precio" class="form-control" placeholder="Ej.: 2990 " required>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-5 control-label">Categorías</label>
          <div class="col-sm-7">
            @foreach ($categorias as $categoria)
            <label class="checkbox-inline">
              <input type="checkbox" id="inlineCheckbox1" name="idsCategorias[]" value={{ $categoria->cod_categoria }} > {{ $categoria->nom_categoria }}
            </label>
            @endforeach
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
            <button type="submit" class="btn btn-purple">Crear</button>
            </div> 
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
  @stop