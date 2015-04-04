@section('content')
<!-- begin:content -->
<div class="col-md-9 col-sm-9 single-item">
  <div class="row">
    <div class="col-md-5 col-sm-5">
      <div id="itemsingle" class="carousel slide clearfix">

        <div class="carousel-inner">
          <div class="item active">
            <li data-target="#itemsingle" data-slide-to="0" class="active">
              @if ($producto->imagen != null)
              <img class="img-responsive" src='data:image/jpeg;base64,{{ $producto->imagen }}' />
              @else
              {{ HTML::image("img/manuk.jpg", "Foto 2", array('class' => 'img-responsive'))  }}
              @endif

            </li>
            <!--{{ HTML::image("img/manuk.jpg", "Foto 2", array('class' => 'img-responsive'))  }}-->
          </div>
          <div class="item">
            {{ HTML::image("img/manuk.jpg", "Foto 2", array('class' => 'img-responsive'))  }}
          </div>
          <div class="item">
            {{ HTML::image("img/manuk.jpg", "Foto 2", array('class' => 'img-responsive'))  }}
          </div>
        </div>

        <ol class="carousel-indicators">
          <!--
<li data-target="#itemsingle" data-slide-to="0" class="active"><img src='data:image/jpeg;base64,{{ $producto->imagen }}' /></li>
<li data-target="#itemsingle" data-slide-to="1" class="">{{ HTML::image("img/manuk.jpg", "Foto 2", array('class' => 'img-responsive'))  }}</li>
<li data-target="#itemsingle" data-slide-to="2" class="">{{ HTML::image("img/manuk.jpg", "Foto 2", array('class' => 'img-responsive'))  }}</li>
-->
        </ol>

      </div>
    </div>
    <div class="col-md-7 col-sm-7">
      <h3><strong>{{$producto->nombre_producto}}</strong> - {{$producto->laboratorio->nom_laboratorio}} 
      </h3>
      @if(Auth::user() && Auth::user()->tipo_usuario == "administrador") 
      <a class='btn btn-warning pull-right' href=/producto/editar/{{$producto->codigo_producto}}> <i class='glyphicon glyphicon-pencil icon-white'></i></a>
      @endif
      <span class="pull-right label label-warning">Código # {{$producto->codigo_producto}}</span>
      @if($producto->contenido != null)
      <p>Contenido: {{$producto->contenido}}</p>
      @endif
      <p>{{$producto->descripcion}}</p>
      @if($producto->ingredientes != null)
      <p>Componentes: {{$producto->ingredientes}}</p>
      @endif
      <h4>{{$producto->precioVentaF}}</h4>

      <hr>
      <p>Cantidad a comprar: <input type="number" name="cantidad" value=1 min=1 max=100> 
        <a id="comprar" class="btn btn-success btn-large" data-cod-producto={{$producto->codigo_producto}} ><i class="icon-shopping-cart"></i> Agregar al carro de compras</a>
      </p>
    </div>

  </div>


</div>
<!-- end:product-content -->

<!-- begin:product-sidebar -->
<!--
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
</div>
-->
<!-- end:product-sidebar -->


@stop

@section('extra-js')
{{ HTML::script('js/comprarProducto.js') }}
@stop()