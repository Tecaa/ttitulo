@section('content')
<div class="col-md-12">
  <h2>{{ $categoria->nom_categoria}}</h2>
  <p>{{ $categoria->descripcion }}</p>
  
  @foreach ($productos as $prod)
  <ul class="thumbnails">
    
    <li class="col-md-3 col-sm-3">
      <div class="thumbnail">
        <a href="/producto/consultar/{{$prod->codigo_producto}}"> {{ HTML::image("img/manuk.jpg", "Foto 2", array('class' => 'img-responsive'))  }}</a>
        <div class="caption-details">
          <h3>{{$prod->nombre_producto}}</h3>
          <span class="price">{{$prod->precioVentaF}}</span>
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
    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
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