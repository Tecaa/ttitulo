@section('content');
<!-- begin:contact -->
<div class="page-content contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li><a href="#">Inicio</a></li>
          <li class="active">Contacto</li>
        </ol>
      </div>
    </div>

        
    <ul class="list-unstyled social-icon">
      <li><a href="http://www.facebook.com/JoyasSagitario" rel="tooltip" title="Facebook" class="icon-facebook">
        <span><i class="fa fa-facebook-square"></i> /JoyasSagitario</span></a></li>
      <li><span><i class="fa fa-whatsapp"></i> +56 912345678</span></li>
    </ul>
        
    <div class="row">
      <div class="col-md-12 text-center">
        <h3>¡Envíanos un mensaje!</h3>
        <p>Contáctanos para obtener la información que necesites o envíar alguna estupenda sugerencia.</p>
      </div>
    </div>
    <div class="row padd20-top-btm">
      <form action="/contacto/enviar" method="post">
        <div class="col-md-5 col-sm-5">
          <h3>Enviar mensaje</h3>
          <ul class="errors">
            @foreach($errors->all('<li>:message</li>') as $message)
            {{ $message }}
            @endforeach
          </ul>
          <input type="text" name="nombre" class="form-control" placeholder="Ingresa tu nombre" required>
          <input type="email" name="email" class="form-control" placeholder="Ingresa tu email para contactarte" required>
          <input type="text" name="asunto" class="form-control" placeholder="Ingresa el asunto de tu mensaje" required>
        </div>
        <div class="col-md-7 col-sm-7">
          <textarea name="mensaje" class="form-control" rows="7" placeholder="Escribe tu mensaje" required></textarea>
          <input type="submit" name="submit" value="Enviar Mensaje" class="btn btn-purple btn-block btn-lg">
        </div>
      </form>
    </div>
    <!--
    <div class="row">
      <div class="col-md-12 text-center">
        <h3>¡Envíanos un mensaje!</h3>
        <p>Contáctanos para obtener la información que necesites o envíar alguna estupenda sugerencia.</p>
      </div>
    </div>
    <div class="row padd20-top-btm">
      <form action="/contacto/enviar" method="post">
        <div class="col-md-5 col-sm-5">
          <h3>Enviar mensaje</h3>
          <ul class="errors">
            @foreach($errors->all('<li>:message</li>') as $message)
            {{ $message }}
            @endforeach
          </ul>
          <input type="text" name="nombre" class="form-control" placeholder="Ingresa tu nombre" required>
          <input type="email" name="email" class="form-control" placeholder="Ingresa tu email" required>
          <input type="text" name="asunto" class="form-control" placeholder="Ingresa el asunto de tu mensaje" required>
        </div>
        <div class="col-md-7 col-sm-7">
          <textarea name="mensaje" class="form-control" rows="7" placeholder="Escribe tu mensaje" required></textarea>
          <input type="submit" name="submit" value="Enviar Mensaje" class="btn btn-purple btn-block btn-lg">
        </div>
      </form>
    </div>
    -->
  </div>
</div>

<div id="maps"></div>
<!-- end:contact -->


@stop