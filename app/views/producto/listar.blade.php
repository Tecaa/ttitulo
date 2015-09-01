@section('extra-css')
  {{ HTML::style('css/listarProductos.css') }}
@stop()
@section('content')
<div class="col-md-12">
  <h2>{{ $categoria->nom_categoria}}</h2>
  <p>{{ $categoria->descripcion }}</p>
  
  @foreach ($productos as $prod)
  <ul class="thumbnails">
    <li class="col-md-3 col-sm-3">
      <div class="thumbnail">
        <a href="/producto/consultar/{{$prod->codigo_producto}}"> 
          @if($prod->imagen == null)
            {{ HTML::image("img/nodisponible.jpg", "Foto 2", array('class' => 'img-responsive imagenListada'))  }}
          @else
            <img class="img-responsive imagenListada" src='data:image/jpeg;base64,{{ $prod->imagen_low }}' />
          @endif
        </a>
        <div class="caption-details">
          <h3>{{$prod->nombre_producto}}</h3>
          <label class="labelListado">@if($prod->contenido != null) {{$prod->contenido}} (USA) - {{$prod->tamanoEuropeo}} (Eur) @endif</label>
          <?php $oferta = false; ?>
              @if($prod->precio_venta_oferta != null)
                <?php $oferta = true; ?>
              @endif
              <a href="/producto/consultar/{{$prod->codigo_producto}}"> <span class="price">
                @if($oferta)
                <strike>
                  @endif
                {{$prod->precioVentaF}}
                  @if ($oferta)
                </strike>
                {{$prod->precioVentaOfertaF}}
                @endif
                </span></a>
        </div>
      </div>
    </li>

  </ul>
  @endforeach
  @if ($pages > 1)

  <ul class="pagination">
    <li class="disabled"><a href="#">Página {{$page}} de {{$pages}}</a></li>
    <li class="disabled"><a href="#">&laquo;</a></li>

    @for ($i = 1; $i <= $pages; $i++)
  <li
      @if($page == $i)
      class="active"
      @endif
      ><a href="/producto/categoria/{{$categoria->cod_categoria}}/{{$i}}/ ">{{ $i }} 
    @if($page == $i)
    <span class="sr-only">(current)</span>
    @endif
    </a></li>
  @endfor
  <li><a href="#">&raquo;</a></li>

  </ul>
@endif
</div>
@stop

