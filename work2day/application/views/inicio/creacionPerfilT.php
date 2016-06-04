<!DOCTYPE html>
<html lang="en">
				<head>
								 <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="<?php echo $this->config->item('app_url').'template/img/favicon.png';?>">

        <title>Work2Day</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo $this->config->item('app_url').'template/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="<?php echo $this->config->item('app_url').'template/bootstrap/css/ie10-viewport-bug-workaround.css';?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $this->config->item('app_url').'template/css/styleLogin.css';?>">
        <link rel="stylesheet" href="<?php echo $this->config->item('app_url').'template/css/style.css';?>">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="<?php echo $this->config->item('app_url').'template/bootstrap/js/ie-emulation-modes-warning.js';?>"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

        <!-- Custom styles for this template -->
        <link href="<?php echo $this->config->item('app_url').'template/bootstrap/css/carousel.css';?>" rel="stylesheet">
				</head>
				<!-- NAVBAR
================================================== -->
				<body class="colorFondo">
                    <div class="navbar-wrapper">
                    <div class="container">
<form method="POST" action="<?php echo $this->config->item('app_url').'index.php/inicio/crearPerfil'?>">
  <fieldset class="form-group">
    
    <label for="nombre">Nombre y apellidos</label>
    <input class="form-control" id="nombre" name="nombre" placeholder="Introduce tu nombre y apellidos">
    
  </fieldset>
  <fieldset class="form-group">
    <label for="estudios">Estudios</label>
      <textarea class="form-control" id="estudios" name="estudios"></textarea>
  </fieldset>
    <fieldset class="form-group">
    <label for="experiencia">Experiencia</label>
      <textarea class="form-control" id="experiencia" name="experiencia"></textarea>
  </fieldset>
    <fieldset class="form-group">
    <label for="habilidades">Habilidades</label>
      <textarea class="form-control" id="habilidades" name="habilidades"></textarea>
  </fieldset>
     <button type="submit" class="btn btn-primary">Enviar</button>
    <?php
    if($mensaje!=""){
        echo "<div>".$mensaje."</div>";
    }
    ?>
  
</form>
</div>
</div>
								<!-- Carousel
================================================== -->
								<!-- <div id="myCarousel" class="carousel slide" data-ride="carousel">


<!-- Indicators -->
								<!--
<ol class="carousel-indicators">
<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<li data-target="#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>
</ol>

<div class="carousel-inner" role="listbox">
<div class="item active">
<img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
<div class="container">
<div class="carousel-caption">
<h1>Example headline.</h1>
<p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
</div>
</div>
</div>
<div class="item">
<img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
<div class="container">
<div class="carousel-caption">
<h1>Another example headline.</h1>
<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
</div>
</div>
</div>
<div class="item">
<img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
<div class="container">
<div class="carousel-caption">
<h1>One more for good measure.</h1>
<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
</div>
</div>
</div>
</div>

<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>-->

								<!--<div class="item">
<img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
<div class="container">


</div>

<div class="container">
<div class="carousel-caption caption2">
<h1>Empresa</h1>
<p>Crea tu perfil y encuentra trabajadores que encajen a la perfección con tu proyecto o idea. Podrás dar con tu trabajador ideal en unos sencillos pasos.</p>
<p><a class="btn btn-lg btn-primary" href="#" role="button">Quiero registrar mi empresa</a></p>
</div>

</div>

</div>



</div>--><!-- /.carousel -->


								<!-- Marketing messaging and featurettes
================================================== -->
								<!-- Wrap the rest of the page in another container to center all the content. -->





								<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="<?php echo $this->config->item('app_url').'template/js/index.js';?>"></script>

    




        <!-- Bootstrap core JavaScript
================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
        <script src="<?php echo $this->config->item('app_url').'template/bootstrap/js/jquery.min.js';?>"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $this->config->item('app_url').'template/bootstrap/js/vendor/jquery.min.js';?>"><\/script>')</script>
        <script src="<?php echo $this->config->item('app_url').'template/bootstrap/js/bootstrap.min.js';?>"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="<?php echo $this->config->item('app_url').'template/bootstrap/js/vendor/holder.min.js';?>"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="<?php echo $this->config->item('app_url').'template/bootstrap/js/ie10-viewport-bug-workaround.js';?>"></script>
         <script>
   /* $(document).ready(function(){
        $('#login_button').click(function(){
            var nombre=document.getElementById("logUsu").value;
            var password=document.getElementById("passUsu").value;
             $.post("http://localhost/codeIgniter/index.php/inicio/comprobar", {nombre:nombre,password:password});
        });

    });*/
        
    
        
    </script>
				</body>
</html>