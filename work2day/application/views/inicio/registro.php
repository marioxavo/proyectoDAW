<!DOCTYPE html>
<html lang="en">
    <?php include("head.php"); ?>
    <!-- NAVBAR
================================================== -->
    
    <body>
        <!--<div class="navbar-wrapper">
            <div class="container">

                <nav class="navbar navbar-inverse navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Work2Day</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Home</a></li>
                                <li><a href="#about">About</a></li>
                                <li><a href="#contact">Contact</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li class="dropdown-header">Nav header</li>
                                        <li><a href="#">Separated link</a></li>
                                        <li><a href="#">One more separated link</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

            </div>
        </div>-->


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

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
            <div class="wrapper">
	<div class="container">
		<center><h1>Registro <?=$dato?></h1></center>
        <center><h3><?php if($mensaje){ echo $mensaje;}?></h3></center>
        <form class="form" method="post" action="<?php echo $this->config->item('app_url').'index.php/inicio/registrar/'.$id_grupo;?>" >
            <input id="regUsu" name="nombre" type="text" placeholder="Usuario">
            <input id="regEmail" name="email" type="text" placeholder="Email">
            <input id="passUsu" name="password" type="password" placeholder="Contraseña">
            <center><button type="submit" id="registration_button">Registrarse</button></center>
            <center><div style="margin-top: 1.5em;"><a id="tengo_usuario" class="botones btn btn-primary" href="<?php echo $this->config->item('app_url').'index.php/inicio/';?>" role="button">Ya tengo usuario</a></div></center>
            
        </form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div></div>
            <div class="row" style="margin-top:420px">
                <center><div class="col-lg-6">
                 
                        <h1>Trabajador</h1>
                        <p>Regístrate y encontrarás cientos de trabajos perfectos para tu perfil. Podrás encontrar tanto proyectos puntuales como trabajos de larga duración.</p>
                        <p><div style="margin-top: 1.5em"><a class="botones btn btn-primary" href="<?php echo $this->config->item('app_url').'index.php/inicio/registro/1';?>" role="button">Quiero registrarme</a></div></p>
          
                
                </div></center><!-- /.col-lg-4 -->
                <center><div class="col-lg-6">
                   
                        <h1>Empresa</h1>
                        <p>Crea tu perfil y encuentra trabajadores que encajen a la perfección con tu proyecto o idea. Podrás dar con tu trabajador ideal en unos sencillos pasos.</p>
                        <p><div style="margin-top: 1.5em;"><a class="botones btn btn-primary" href="<?php echo $this->config->item('app_url').'index.php/inicio/registro/2';?>" role="button">Quiero registrar mi empresa</a></div></p>
                  
                    
                </div></center><!-- /.col-lg-4 -->
                
            </div><!-- /.row -->


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Conéctate. <span class="text-muted">Relacionate.</span></h2>
                    <p class="lead">En Work2Day podrás conectar con los trabajadores o empresas directamente y poder discutir todos los detalles sin la necesidad de una entrevista de trabajo.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive center-block" src="http://localhost/work2day/template/img/personasTrajes.jpg" alt="Generic placeholder image">
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
               <div class="col-md-5">
                    <img class="featurette-image img-responsive center-block" src="http://localhost/work2day/template/img/currante.jpg" alt="Generic placeholder image">
                </div>
                <div class="col-md-7">
                    <h2 class="featurette-heading">Rapidez. <span class="text-muted">El tiempo es importante.</span></h2>
                    <p class="lead">No pierdas tiempo, en Work2Day se garantiza una comunicación casi al instante entre trabajador y empresa.</p>
                </div>
                
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->


            <!-- FOOTER -->
            <footer>
                <p class="pull-right"><a href="#">Back to top</a></p>
                <p>&copy; 2015 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
            </footer>

        </div><!-- /.container -->


 
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="http://localhost/work2day/template/js/index.js"></script>

    




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
