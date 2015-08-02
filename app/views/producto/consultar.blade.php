@section('content')
<!-- begin:content -->
<div class="col-md-9 col-sm-9 single-item">
  <div class="row">
    <div class="col-md-5 col-sm-5">
      <div id="itemsingle" class="carousel slide clearfix">

        <div class="carousel-inner">
          <div class="item active">
            <!--<li data-target="#itemsingle" data-slide-to="0" class="active">-->
              @if ($producto->imagen != null)
              <img class="img-responsive" src='data:image/jpeg;base64,{{ $producto->imagen }}' />
              @else
              {{ HTML::image("img/nodisponible.jpg", "Foto 2", array('class' => 'img-responsive'))  }}
              @endif

            <!--</li>-->
            <!--{{ HTML::image("img/manuk.jpg", "Foto 2", array('class' => 'img-responsive'))  }}-->
          </div>
          <div class="item">
            {{ HTML::image("img/nodisponible.jpg", "Foto 2", array('class' => 'img-responsive'))  }}
          </div>
          <div class="item">
            {{ HTML::image("img/nodisponible.jpg", "Foto 2", array('class' => 'img-responsive'))  }}
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
      <h3><strong>{{$producto->nombre_producto}}</strong><!-- - {{$producto->proveedor->nom_proveedor}} -->
      </h3>
      @if(Auth::user() && Auth::user()->tipo_usuario == "administrador") 
      <a class='btn btn-warning pull-right' href=/producto/editar/{{$producto->codigo_producto}}> <i class='glyphicon glyphicon-pencil icon-white'></i></a>
      @endif
      <span class="pull-right label label-warning">Código # {{$producto->codigo_barras}}</span>
      @if($producto->contenido != null)
      <p>Tamaño: {{$producto->contenido}}</p>
      @endif
      <p>{{$producto->descripcion}}</p>
      @if($producto->ingredientes != null)
      <p>Componentes: {{$producto->ingredientes}}</p>
      @endif
      <!--<p>Unidades: {{$producto->cantidad}} <em>(Solo referencial, al realizar el pedido se le confirmará el stock)</em></p>-->
      <?php $oferta = false; ?>
      @if($producto->precio_venta_oferta != null)
        <?php $oferta = true; ?>
      @endif
      <h4>
        @if($oferta)
        <strike>
          @endif
          {{$producto->precioVentaF}}
          @if ($oferta)
        </strike>
        {{$producto->precioVentaOfertaF}}
        @endif
      </h4>
      <hr>
      <p><!--Cantidad a comprar: --><input type="hidden" name="cantidad" value=1 min=1 max=100> 
        <a id="comprar" class="btn btn-success btn-large" data-cod-producto={{$producto->codigo_producto}} ><i class="icon-shopping-cart"></i> Agregar al carro de compras</a>
      </p>
    </div>

  </div>
  
  <div class="rotContainer">
    <div style="{background:white;}">
      <img id="img360" src="{{ asset('img/loading.gif') }}" width="330" height="330" draggable="true">
      </img>
    </div>
  </div>
  

</div>

@stop

@section('extra-js')
{{ HTML::script('js/comprarProducto.js') }}
{{ HTML::script('js/jquery.Threesixty/jquery.threesixty.js') }}
{{ HTML::script('js/photos360loader.js') }}
<!--
<script>
  var arr = [];
  $(function() {
    if (imagen360 == null)
      return;

    arr.push(imagen360.d0);
    arr.push(imagen360.d45);
    arr.push(imagen360.d90);
    arr.push(imagen360.d135);
    arr.push(imagen360.d180);
    arr.push(imagen360.d225);
    arr.push(imagen360.d270);
    arr.push(imagen360.d315);


    $("#img360").threesixty({images:arr, method:'click', autoscrollspeed:200, 'cycle':3, direction:"backward", base64:true});
    //$("#click").threesixty({images:arr2, method:'click', 'cycle':1, 'resetMargin': 10});
    //$("#auto").threesixty({images:arr2, method:'auto', autoscrollspeed:100});

  });
</script>
-->
@stop()