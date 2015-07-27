@section('content')
<div class="col-md-7 col-sm-7">
  <h3>{{$titulo}}</h3>
  <div class="row confirm">
  <div class="col-md-15">
    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/producto/editando/{{$producto->codigo_producto}}">

      <hr>
      <div class="form-group">
        <label class="col-sm-5 control-label">Código de barras</label>
        <div class="col-sm-7">
          <input type="number" name="codigoB" value= "{{ $producto->codigo_barras}}" class="form-control" placeholder="Codigo : ">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-5 control-label">Nombre producto (*)</label>
        <div class="col-sm-7">
          <input type="text" name="nombre" value= "{{ $producto->nombre_producto}}" class="form-control" placeholder="Nombre : " required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-5 control-label">Laboratorio (*)</label>
        <div class="col-sm-7">
          <select class="form-control" name="laboratorio"  required>
            @foreach ($labs as $lab)
            <option value="{{ $lab->cod_laboratorio }}" 
                    @if ($producto->cod_laboratorio === $lab->cod_laboratorio)
              selected
              @endif
              > 
              {{ $lab->nom_laboratorio}}
            </option>
            @endforeach
          </select>
        </div>
      </div>
      
      <div class="form-group">
          <label class="col-sm-5 control-label">Descripción </label>
          <div class="col-sm-7">
            <input type="text" name="descripcion" class="form-control" value="{{$producto->descripcion}}">
          </div>
        </div>

       <div class="form-group">
          <label class="col-sm-5 control-label">Contenido </label>
          <div class="col-sm-7">
            <input type="text" name="contenido" class="form-control" value="{{$producto->contenido}}" placeholder="Ej: 1 lt, 100 grs, 2 kg, 3 unid.">
          </div>
        </div>
       <div class="form-group">
          <label class="col-sm-5 control-label">Componentes </label>
          <div class="col-sm-7">
            <input type="text" name="ingredientes" class="form-control" value="{{$producto->ingredientes}}" placeholder="Ej: Miel, agua, azúcar, nueces molidas y pasas.">
          </div>
        </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Precio (*)</label>
        <div class="col-sm-7">
          <input type="number" name="precio" value="{{ $producto->precio_venta}}" class="form-control" placeholder="Precio : " required>
        </div>
      </div>

      <div class="form-group">
          <label class="col-sm-5 control-label">Categorías</label>
          <div class="col-sm-7">
            @foreach ($categorias as $categoria)
            <label class="checkbox-inline">
                <input type="checkbox" id="inlineCheckbox1" name="idsCategorias[]" value={{ $categoria->cod_categoria }}
              @foreach ($cats_producto as $cp)
                @if ($cp->cod_categoria == $categoria->cod_categoria)
                  checked
                @endif
              @endforeach
              
              > {{ $categoria->nom_categoria }}
            </label>
            @endforeach
          </div>
        </div>

      <div class="form-group">
        <label class="col-sm-5 control-label">Subir imágen de presentación</label>
        <div class="col-sm-7">
          <input type="file" name="imagen" class="form-control" method="post" accept="image/*">
        </div>
      </div>
      <hr>
      <hr>

      <div class="form-group">
        <label class="col-sm-5 control-label">Subir imágen 0</label>
        <div class="col-sm-7">
          <input type="file" name="img0" class="form-control" method="post" accept="image/*">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Subir imágen 45</label>
        <div class="col-sm-7">
          <input type="file" name="img45" class="form-control" method="post" accept="image/*">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Subir imágen 90</label>
        <div class="col-sm-7">
          <input type="file" name="img90" class="form-control" method="post" accept="image/*">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Subir imágen 135</label>
        <div class="col-sm-7">
          <input type="file" name="img135" class="form-control" method="post" accept="image/*">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Subir imágen 180</label>
        <div class="col-sm-7">
          <input type="file" name="img180" class="form-control" method="post" accept="image/*">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Subir imágen 225</label>
        <div class="col-sm-7">
          <input type="file" name="img225" class="form-control" method="post" accept="image/*">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Subir imágen 270</label>
        <div class="col-sm-7">
          <input type="file" name="img270" class="form-control" method="post" accept="image/*">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Subir imágen 315</label>
        <div class="col-sm-7">
          <input type="file" name="img315" class="form-control" method="post" accept="image/*">
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
        @if ($producto->imagen == null)
        {{ HTML::image("img/manuk.jpg", "Logo") }}
        @else
          <img class="img-responsive imagenListada" src='data:image/jpeg;base64,{{ $producto->imagen }}' />
        @endif
      </div>
      <div class="item">
        {{ HTML::image("img/manuk.jpg", "Logo") }}
      </div>
      <div class="item">
        {{ HTML::image("img/manuk.jpg", "Logo") }}
      </div>
    </div>

    <ol class="carousel-indicators">

    </ol>
  </div>



</div>


  @stop