<!DOCTYPE html>
<html lang="en">
    <?php include("head.php"); ?>
    <!-- NAVBAR
================================================== -->
    <body class="colorFondo">
        <div class="navbar-wrapper">
            <div class="container">

                <nav class="navbar navbar-inverse navbar-static-top">
                    
                    
                    
                    <?php include("cabecera.php"); ?>
                  
                    
                </nav>
                <div class="row">
                    <h2 style="color:white;" class="col-md-offset-3 col-md-6">Empieza buscando ofertas en tu ciudad</h2>
                    <div class="col-md-6 col-md-offset-3">
                        <div class="input-group">
                            <input type="text" class="form-control" aria-label="...">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ciudad <span class="caret"></span></button>
                                <ul style="overflow-y: scroll; max-height: 200px;" class="dropdown-menu dropdown-menu-right">
                                    <?php foreach($provincias as $provincia){ ?>
                                        <li><a href=""><?= $provincia['provincia']; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div><!-- /btn-group -->
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div>
                <div class="row marginCategorias">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img class="imagenCategoria" src="<?php echo $this->config->item('app_url').'template/img/hosteleria.jpg';?>" alt="...">
                            <div class="caption">
                                <h3 class="centrado">Hostelería</h3>
                                <p>...</p>
                                 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img class="imagenCategoria" src="<?php echo $this->config->item('app_url').'template/img/informatica.jpg';?>" alt="...">
                            <div class="caption">
                                <h3 class="centrado">Informática</h3>
                                <p>...</p>
                                 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img class="imagenCategoria" src="<?php echo $this->config->item('app_url').'template/img/limpieza.jpg';?>" alt="...">
                            <div class="caption">
                                <h3 class="centrado">Limpieza</h3>
                                <p>...</p>
                                 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img class="imagenCategoria" src="<?php echo $this->config->item('app_url').'template/img/mecanica.jpg';?>" alt="...">
                            <div class="caption">
                                <h3 class="centrado">Mecánica</h3>
                                <p>...</p>
                                 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img class="imagenCategoria" src="<?php echo $this->config->item('app_url').'template/img/ingenieria.jpg';?>" alt="...">
                            <div class="caption">
                                <h3 class="centrado">Ingeniería</h3>
                                <p>...</p>
                                 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img class="imagenCategoria" src="<?php echo $this->config->item('app_url').'template/img/educacion.jpg';?>"  alt="...">
                            <div class="caption">
                                <h3 class="centrado">Educación</h3>
                                <p>...</p>
                                 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <footer style="color: white;">
                        <p class="pull-right"><a style="color: black;" href="#">Back to top</a></p>
                        <p>&copy; 2015 Abenza, Inc. &middot; <a style="color: black;" href="#">Privacy</a> &middot; <a style="color: black;" href="#">Terms</a></p>
                    </footer>
                </div>
                <!-- FOOTER -->


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
        <script src="?php echo $this->config->item('app_url').'template/bootstrap/js/ie10-viewport-bug-workaround.js';?>"></script>
    </body>
</html>
