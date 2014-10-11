<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="description" content="dodolan manuk responsive catalog themes built with twitter bootstrap">
    <meta name="keywords" content="responsive, catalog, cart, themes, twitter bootstrap, bootstrap">
    <meta name="author" content="afriq yasin ramadhan">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Dodolan Manuk - Responsive catalog Template</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand visible-xs" href="#">Dodolan Manuk</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        	<ul class="nav navbar-nav nav-left">
			  <li class="active"><a href="index.html">Home</a></li>
			  <li><a href="about.html">About</a></li>
			  <li><a href="profile.html">Profile</a></li>
			  <li><a href="contact.html">Contact</a></li>
			</ul>
			<a href="#" class="logo visible-lg visible-md"><img src="img/logo.jpg" alt="dodolan manuk responsive catalog themes"></a>
			<div id="brand" class="visible-lg visible-md">&nbsp;</div>
			<ul class="nav navbar-nav nav-right">
			  <li><a href="pricing.html">Price</a></li>
			  <li><a href="order.html">Order</a></li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
				<ul class="dropdown-menu">
				  <li><a href="product.html">Canary</a></li>
				  <li><a href="product.html">Emprit</a></li>
				  <li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Doro <i class="fa fa-caret-down icon-dropdown"></i></a>
					<ul class="dropdown-menu sub-menu">
					  <li><a href="product.html">Doro Pos</a></li>
					  <li><a href="product.html">Doro Kucir</a></li>
					  <li><a href="product.html">Doro Belehan</a></li>
					  <li><a href="product.html">Doro Sungut</a></li>
					</ul>
				  </li>
				  <li class="divider"></li>
				  <li><a href="product.html">Pitik</a></li>
				  <li><a href="product.html">Cucak Rowo</a></li>
				</ul>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
				<ul class="dropdown-menu">
				  <li><a href="blog.html">Blog 1</a></li>
				  <li><a href="blog2.html">Blog 2</a></li>
				  <li><a href="single.html">Single 1</a></li>
				  <li><a href="single2.html">Single 2</a></li>
				</ul>
			  </li>
			</ul>
          
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

	<!-- begin:heading -->
	<div class="heads" style="background: url(img/img02.jpg) center center;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><span>//</span> Order</h2>
				</div>
			</div>
		</div>
	</div>
	<!-- end:heading -->
	
	<!-- begin:content -->
	<div class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
				      <li><a href="#">Home</a></li>
				      <li class="active">Order</li>
				    </ol>
				</div>
			</div>
			
			<div class="row confirm">
				<div class="col-md-12">
					<form class="form-horizontal" role="form">
					  	<h3 class="text-center">Order</h3>
					  	<hr>
						<div class="form-group">
							<label class="col-sm-3 control-label">Item Code</label>
							<div class="col-sm-4">
							  <input type="text" class="form-control" placeholder="Code : " required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Quantity</label>
							<div class="col-sm-4">
							  <input type="text" class="form-control" placeholder="Quantity : " required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Name</label>
							<div class="col-sm-6">
							  <input type="text" class="form-control" placeholder="Name : " required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Email address</label>
							<div class="col-sm-6">
							  <input type="email" class="form-control" placeholder="Email address : " required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Phone number</label>
							<div class="col-sm-6">
							  <input type="text" class="form-control" placeholder="Phone number : " required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Shipping Address</label>
							<div class="col-sm-6">
							  <textarea class="form-control" rows="8" placeholder="Shipping Address : " required></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Payment Method</label>
							<div class="col-sm-6">
							  <select class="form-control" required>
								<option value="Paypall">Paypall</option>
								<option value="Bank Transfer">Bank Transfer</option>
								<option value="Bitcoins">Bitcoin</option>
							  </select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Notes</label>
							<div class="col-sm-6">
							  <textarea class="form-control" rows="8" placeholder="Notes : "></textarea>
							</div>
						</div>

						<div class="form-group">
						    <div class="col-sm-offset-3 col-sm-10">
						      <button type="submit" class="btn btn-purple">Order Now</button>
						    </div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end:content -->
	
	<!-- begin:footer -->
	<div id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3>dodolan manuk</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis lectus metus,<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

					<ul class="list-unstyled social-icon">
		              <li><a href="#" rel="tooltip" title="Facebook" class="icon-facebook"><span><i class="fa fa-facebook-square"></i></span></a></li>
		              <li><a href="#" rel="tooltip" title="Twitter" class="icon-twitter"><span><i class="fa fa-twitter"></i></span></a></li>
		              <li><a href="#" rel="tooltip" title="Linkedin" class="icon-linkedin"><span><i class="fa fa-linkedin"></i></span></a></li>
		              <li><a href="#" rel="tooltip" title="Instagram" class="icon-gplus"><span><i class="fa fa-google-plus"></i></span></a></li>
		              <li><a href="#" rel="tooltip" title="Instagram" class="icon-instagram"><span><i class="fa fa-instagram"></i></span></a></li>
		            </ul>

					<div class="sitemap">
						<ul>
							<li><a href="index.html">HOME</a></li>
							<li><a href="about.html">ABOUT</a></li>
							<li><a href="profile.html">PROFILE</a></li>
							<li><a href="contact.html">CONTACT</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end:footer -->
	
	<!-- begin:copyright -->
	<div id="copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<small>Copyright &copy; 2013 Dodolan Manuk All Right Reserved. Made With <i class="fa fa-heart-o"></i> by Afriq</small>
				</div>
			</div>
		</div>
	</div>
	<!-- end:copyright -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script src="js/gmap3.js"></script>
    <script src="js/script.js"></script>

  </body>
</html>