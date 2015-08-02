<!--This is a blade template that goes in email message to site administrator-->
<?php
//get the first name
$name = Input::get('name');
$email = Input::get ('email');
$asunto = Input::get ('asunto');
$mensaje = Input::get ('mensaje');
$date_time = date("F j, Y, g:i a");
$userIpAddress = Request::getClientIp();
?> 

<h1>Has sido contactado por </h1>

<p>
  Nombre: <?php echo ($name); ?> <br>
  Email address: <?php echo ($email);?> <br>
  Asunto: <?php echo ($asunto); ?><br>
  Mensaje: <?php echo ($mensaje);?><br>
  Fecha: <?php echo($date_time);?><br>
  IP address del usuario: <?php echo($userIpAddress);?><br>

</p>