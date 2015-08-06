@section('extra-css')
  {{ HTML::style('js/jQuery-ui/jquery-ui.min.css') }}
{{ HTML::style('js/jQuery-ui/jquery-ui.theme.min.css') }}
@stop()

@section('content')
<div class="col-md-7 col-sm-7">
  <h3>{{$titulo}}</h3>
  <div class="row confirm">
  <div class="col-md-15">
    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/producto/encargando/{{$producto->codigo_producto}}">

       <hr>

      <div class="form-group">
        <label class="col-sm-5 control-label">Producto nombre</label>
        <div class="col-sm-7">
          <label class="form-control">{{$producto->nombre_producto}}</label>
        </div>
      </div>

        <div class="form-group">
        <label class="col-sm-5 control-label">Producto código</label>
        <div class="col-sm-7">
          <label class="form-control">{{$producto->codigo_barras}}</label>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-5 control-label">Producto cantidad</label>
        <div class="col-sm-7">
          <label class="form-control">{{$producto->cantidad}}</label>
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-5 control-label">Producto precio de venta</label>
        <div class="col-sm-7">
          <label class="form-control">{{$producto->precioVentaF}}</label>
        </div>
      </div>
      
      @if($producto->precio_venta_oferta != null)
      <div class="form-group">
        <label class="col-sm-5 control-label">Producto precio de oferta</label>
        <div class="col-sm-7">
          <label class="form-control">{{$producto->precioVentaOfertaF}}</label>
        </div>
      </div>
      @endif
      
      <hr>

      <div class="form-group">
        <label class="col-sm-5 control-label">Rut cliente sin puntos y con guión</label>
        <div class="col-sm-7">
          <input type="text" name="rut" class="form-control" pattern="\d{3,8}-[\d|kK]{1}" placeholder="Rut de cliente (Opcional)">
        </div>
      </div>

        <div class="form-group">
        <label class="col-sm-5 control-label">Nombre cliente (*)</label>
        <div class="col-sm-7">
          <input type="text" name="nombre"  class="form-control" placeholder="Nombre del cliente" required>
        </div>
      </div>
      
      <hr>

      <div class="form-group">
        <label class="col-sm-5 control-label">Fecha de encargo (*)</label>
        <div class="col-sm-7">
          <input type="text" id="datepicker" class="form-control" placeholder="DD/MM/AAAA : " required>
          <input type="hidden" name="fecha_encargo" id="fecha_encargo" required>

        </div>
      </div>
      
       <div class="form-group">
        <label class="col-sm-5 control-label">Monto abonado(*)</label>
        <div class="col-sm-7">
          <input type="number" name="monto_abonado" class="form-control" placeholder="Cantidad ya pagada por el cliente" required>
        </div>
      </div>
      
      
      
      <div class="form-group">
        <label class="col-sm-5 control-label">Cantidad</label>
        <div class="col-sm-7">
          <input type="numeric" name="cantidad" value=1 class="form-control" placeholder="Unidades de este producto encargadas por este cliente" min=1 max=100 required>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-10">
          <div class="pull-right">
            <button type="submit" class="btn btn-purple">Registrar encargo</button>
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
@section('extra-js')
{{ HTML::script('js/jQuery-ui/jquery-ui.min.js') }}
{{ HTML::script('js/jQuery-ui/jquery-ui-es.js') }}

<script>
  $(function() {
    $( "#datepicker" ).datepicker({
      dateFormat: "dd/mm/yy",
      altFormat: "yy-mm-dd",
      altField: "#fecha_encargo",
      changeMonth: true,
      changeYear: true,
      yearRange: "-100:c"
      //showOn: "button",
      // buttonImage: "images/calendar.gif",
      // buttonImageOnly: true,
      // buttonText: "Select date"
    });
  });
</script>

@stop()