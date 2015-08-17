@section('content')
<!-- begin:slider -->
    <div id="home">
      <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#home-slider" data-slide-to="0" class="active"></li>
          <li data-target="#home-slider" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
          <div class="item active" style="background: url(img/img01.jpg);">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="carousel-content">
                    <h2 class="animated fadeInUpBig text-center text-black">Bienvenidos</h2>
                      <p class="animated rollIn text-black text-center"><span class="text900">Le invitamos a conocer nuestras variedades en joyas. ¡Regístrese en la sección Mi Cuenta para hacer sus pedidos!</span> </p>  
                  </div>
                </div> 
              </div>
            </div>
          </div>
          <div class="item" style="background: url(img/img02.jpg);">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="carousel-content">
                  	<h3 class="animated fadeInLeftBig text-left">Inaugurando nueva página</h3>
					<p class="animated fadeInDownBig text-left">Compruebe las rebajas por la inauguración de nuestra página.<br> ¡Son por poco tiempo!.</p>
					<a class="btn btn-purple btn-lg animated fadeInRight" href="/producto/ofertas">Ver ofertas &raquo;</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a class="left carousel-control" href="#home-slider" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>
        <a class="right carousel-control" href="#home-slider" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
        <div class="pattern"></div>
      </div>

    </div>
    <!-- end:slider -->
	
	<!-- begin:tagline -->	
	<div id="tagline">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Conozca nuestra galería de joyas</h2>
					<p>Visite nuestra galería de joyas en la sección Productos del panel superior.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end:tagline -->
	
	<!-- begin:featured -->
	<div id="featured">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading-title">
						<h2>Características</h2>
						<p>En Joyas Sagitario podrá encontrar lo siguiente. </p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="featured-container">
						<div class="featured-photos">
							<i class="fa fa-gift"></i>
						</div>
						<h3>Compra por internet</h3>
						<p>Podrá comprar las joyas que más le gusten desde la comodidad de su hogar.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="featured-container">
						<div class="featured-photos">
							<i class="fa fa-heart-o"></i>
						</div>
						<h3>Buena atención</h3>
						<p>Atención rápida y amigable para hacer de sus compras una experiencia agradable.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="featured-container">
						<div class="featured-photos">
							<i class="fa fa-flag"></i>
						</div>
						<h3>Revisa nuestro catálogo</h3>
						<p>¡Contamos con una variedad de joyas que cada día se amplía más y más!</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end:featured -->
	
	<!-- begin:catalogue -->
	<div id="catalogue">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading-title">
						<h2>Más populares</h2>
						<p>Los joyas más populares de este último tiempo.</p>
					</div>	
				</div>
			</div>
      

			<div class="row">
        @foreach ($productos as $prod)
          <div class="col-md-3 col-sm-3">
             <div class="thumbnail">
            <a href="/producto/consultar/{{$prod->codigo_producto}}"> 
              @if($prod->imagen == null)
                {{ HTML::image("img/nodisponible.jpg", "Foto 2", array('class' => 'img-responsive imagenListada'))  }}
              @else
                <img class="img-responsive imagenListada" src='data:image/jpeg;base64,{{ $prod->imagen }}' />
              @endif
            </a>
            <div class="caption-details">
              <h3>{{$prod->nombre_producto}} @if($prod->contenido != null) ({{$prod->contenido}}) @endif</h3>
              <label><!--{{$prod->proveedor->nom_proveedor}}--></label>
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
          </div>
          @endforeach
        <!--
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="thumbnail">
					  <div class="caption-img" style="background: url(img/manuk.jpg);"></div>
					  <div class="caption-details">
						<h3>Shampú de Melisa</h3>
						<span class="price">$ 2.500</span>
					  </div>
					  <a href="detail.html"><div class="caption-link"><i class="fa fa-plus"></i></div></a>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="thumbnail">
					  <div class="caption-img" style="background: url(img/manuk.jpg);"></div>
					  <div class="caption-details">
						<h3>Shampú de Melisa</h3>
						<span class="price">$ 200</span>
					  </div>
					  <a href="detail.html"><div class="caption-link"><i class="fa fa-plus"></i></div></a>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="thumbnail">
					  <div class="caption-img" style="background: url(img/manuk.jpg);"></div>
					  <div class="caption-details">
						<h3>Shampú de Melisa</h3>
						<span class="price">$ 200</span>
					  </div>
					  <a href="detail.html"><div class="caption-link"><i class="fa fa-plus"></i></div></a>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="thumbnail">
					  <div class="caption-img" style="background: url(img/manuk.jpg);"></div>
					  <div class="caption-details">
						<h3>Shampú de Melisa</h3>
						<span class="price">$ 200</span>
					  </div>
					  <a href="detail.html"><div class="caption-link"><i class="fa fa-plus"></i></div></a>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="thumbnail">
					  <div class="caption-img" style="background: url(img/manuk.jpg);"></div>
					  <div class="caption-details">
						<h3>Shampú de Melisa</h3>
						<span class="price">$ 200</span>
					  </div>
					  <a href="detail.html"><div class="caption-link"><i class="fa fa-plus"></i></div></a>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="thumbnail">
					  <div class="caption-img" style="background: url(img/manuk.jpg);"></div>
					  <div class="caption-details">
						<h3>Shampú de Melisa</h3>
						<span class="price">$ 200</span>
					  </div>
					  <a href="detail.html"><div class="caption-link"><i class="fa fa-plus"></i></div></a>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="thumbnail">
					  <div class="caption-img" style="background: url(img/manuk.jpg);"></div>
					  <div class="caption-details">
						<h3>Shampú de Melisa</h3>
						<span class="price">$ 200</span>
					  </div>
					  <a href="detail.html"><div class="caption-link"><i class="fa fa-plus"></i></div></a>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="thumbnail">
					  <div class="caption-img" style="background: url(img/manuk.jpg);"></div>
					  <div class="caption-details">
						<h3>Shampú de Melisa</h3>
						<span class="price">$ 200</span>
					  </div>
					  <a href="detail.html"><div class="caption-link"><i class="fa fa-plus"></i></div></a>
					</div>
				</div>
        -->
			</div>
		</div>
	</div>
	<!-- end:catalogue -->	
	
	<!-- begin:testimoni -->
	<div id="testimoni">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="testimoni-icon"><i class="fa fa-quote-left"></i></div>
					<h3>¿Por qué comprar en Joyas Sagitario?</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div id="testi" class="carousel slide" data-ride="carousel">
				      <div class="carousel-inner">
				        <div class="item active">
				           <p class="testimoni-item"> Sistema de compra claro y confiable, los pagos de internet se hacen por transferencias bancarias de la página de los propios bancos.</p>
							<h4>&#8212; Confianza &#8212;</h4>
				        </div>
				        <div class="item">
				           <p class="testimoni-item"> Puedes ver los productos online y consultar cualquier cosa contactándonos</p>
							<h4>&#8212; Transparencia &#8212;</h4>
				        </div>
				        <div class="item">
				           <p class="testimoni-item"> Tenemos buena disponibilidad. Nos puedes contactar por los distintos medios de hoy en día. Revisa la sección Contacto del panel superior para más información.</p>
							<h4>&#8212; Buena comunicación &#8212;</h4>
				        </div>
				      </div>
				      <a class="left carousel-control" href="#testi" data-slide="prev">&lsaquo;</a>
				      <a class="right carousel-control" href="#testi" data-slide="next">&rsaquo;</a>
				    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- end:testimoni -->
	
	<!-- begin:blog -->
<!--
	<div id="blog">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="heading-title">
						<h2>From Blog</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="blog-container">
						<div class="blog-date">
							<i class="fa fa-calendar"></i>
							<span class="meta-date">26</span>
							<span class="meta-month-year">MAR 2014</span>
						</div>
						<h3><a href="single.html">the post title</a></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis lectus metus, at posuere neque.</p>
						<p><a href="single.html" class="btn btn-purple">Read more &raquo;</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="blog-container">
						<div class="blog-date">
							<i class="fa fa-calendar"></i>
							<span class="meta-date">03</span>
							<span class="meta-month-year">FEB 2014</span>
						</div>
						<h3><a href="single.html">the post title</a></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis lectus metus, at posuere neque.</p>
						<p><a href="single.html" class="btn btn-purple">Read more &raquo;</a></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="blog-container">
						<div class="blog-date">
							<i class="fa fa-calendar"></i>
							<span class="meta-date">19</span>
							<span class="meta-month-year">JAN 2014</span>
						</div>
						<h3><a href="single.html">the post title</a></h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis lectus metus, at posuere neque.</p>
						<p><a href="single.html" class="btn btn-purple">Read more &raquo;</a></p>
					</div>
				</div>
				
			</div>
		</div>
	</div>
-->
	<!-- end:blog -->
@stop