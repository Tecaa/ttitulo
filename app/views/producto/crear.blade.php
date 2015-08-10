@section('content')
<div class="col-md-7 col-sm-7">
  <h3>{{$titulo}}</h3>
  <div class="row confirm">
    <div class="col-md-15">
      <form class="form-horizontal" role="form" action="/producto/creando" method="POST" enctype="multipart/form-data">

        <hr>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Proveedor (*)</label>
          <div class="col-sm-7">
            <select class="form-control" name="laboratorio" required>
              @foreach ($labs as $lab)
              <option value="{{ $lab->cod_proveedor }}">{{ $lab->nom_proveedor}}</option>
              @endforeach
            </select>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Código de barras</label>
          <div class="col-sm-7">
            <input type="text" name="codigoB" class="form-control" placeholder="Ej.: 202030 ">
          </div>
        </div>
        
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Nombre producto (*)</label>
          <div class="col-sm-7">
            <input type="text" name="nombre" class="form-control"  placeholder="Ej : Mi producto " required>
          </div>
        </div>
        <!--
         <div class="form-group">
          <label class="col-sm-5 control-label">Cantidad </label>
          <div class="col-sm-7">
            <input type="number" min=1 name="cantidad" class="form-control"  value=1 placeholder="Ej.: 1 " >
          </div>
        </div>
        -->
        <div class="form-group">
          <label class="col-sm-5 control-label">Descripción </label>
          <div class="col-sm-7">
            <input type="text" name="descripcion" class="form-control" placeholder="Ej.: Producto para el cabello " >
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Tamaño (anillos) </label>
          <div class="col-sm-7">
            <input type="number" min=0 max=20 name="contenido" class="form-control" placeholder="Ej.: 8 " >
          </div>
        </div>
        <div class="form-group">
        <label class="col-sm-5 control-label">Uso interno </label>
        <div class="col-sm-7">
          <input type="checkbox" name="uso_interno" class="form-control" value=true>
        </div>
      </div>
<!--
        <div class="form-group">
          <label class="col-sm-5 control-label">Ingredientes </label>
          <div class="col-sm-7">
            <input type="text" name="ingredientes" class="form-control" placeholder="Ej.: aceite de almendras, agua " >
          </div>
        </div>

      <div class="form-group">
          <label class="col-sm-5 control-label">Precio de Compra(*)</label>
          <div class="col-sm-7">
            <input type="number" name="precio_compra" class="form-control" placeholder="Ej.: 2990 " required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Precio de Venta(*)</label>
          <div class="col-sm-7">
            <input type="number" name="precio" class="form-control" placeholder="Ej.: 2990 " required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-5 control-label">Precio Oferta</label>
          <div class="col-sm-7">
            <input type="number" name="precio_venta_oferta" class="form-control" placeholder="(Opcional)">
          </div>
        </div>
-->
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
            <input type="file" name="imagen" class="form-control" method="post" accept="image/*">
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