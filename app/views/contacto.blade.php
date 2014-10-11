@section('content');

	<!-- begin:heading -->
	<div class="heads" style="background: url(img/img02.jpg) center center;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2><span>//</span> contact us</h2>
				</div>
			</div>
		</div>
	</div>
	<!-- end:heading -->

	<!-- begin:contact -->
	<div class="page-content contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">
				      <li><a href="#">Home</a></li>
				      <li class="active">Contact Us</li>
				    </ol>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12 text-center">
					<h3>Lorem ipsum dolor sit amet</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis lectus metus, at posuere neque. Sed pharetra nibh eget orci convallis at posuere leo convallis. Sed blandit augue vitae augue scelerisque bibendum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus quis lectus metus, at posuere neque. Sed pharetra nibh eget orci convallis at posuere leo convallis. Sed blandit augue vitae augue scelerisque bibendum.</p>
				</div>
			</div>
			<div class="row padd20-top-btm">
				<form method="post" action="contact.html">
					<div class="col-md-5 col-sm-5">
						<h3>send message</h3>
						<input type="text" name="name" class="form-control" placeholder="Enter your name" required>
						<input type="email" name="email" class="form-control" placeholder="Enter your mail" required>
						<input type="text" name="subject" class="form-control" placeholder="Enter your subject" required>
					</div>
					<div class="col-md-7 col-sm-7">
						<textarea name="message" class="form-control" rows="7" placeholder="Type your message" required></textarea>
						<input type="submit" name="submit" value="Send Message" class="btn btn-purple btn-block btn-lg">
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div id="maps"></div>
	<!-- end:contact -->
	
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

@stop