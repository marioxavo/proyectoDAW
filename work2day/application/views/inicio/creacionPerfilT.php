<!DOCTYPE html>
<html lang="en">
			<?php include("head.php"); ?>
				<!-- NAVBAR
================================================== -->
				<body class="colorFondo">
                    <div class="navbar-wrapper">
                    <div class="container">
                        <div class="row">
					<h2 style="color:white;" class="col-md-offset-3 col-md-6">Crea un perfil básico para ti</h2>
                    </div>
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
      <fieldset class="form-group">
    <label for="habilidades">Habilidades</label>
      <select class="form-control" id="ciudad" name="ciudad">
          <?php foreach($provincias as $provincia){ ?>
                                        <option value="<?= $provincia['id'];?>"><?= $provincia['provincia']; ?></option>
                                    <?php } ?>
          </select>
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