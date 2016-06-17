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
            <div class="panel-mensajes">
                <ul class="list-group col-md-2 col-sm-3 col-xs-4 col-lg-2" style="list-style:none;">
                    
                    
                    <li><a id="redactarBtn" class="btn btn-primary" href="<?php echo $this->config->item('app_url') ?>index.php/mensajeria/" role="button">Bandeja de entrada</a></li>
                </ul>
            </div>
            <div class="col-md-10 col-sm-9 col-xs-8 col-lg-10">
            <div id="divMensajes" class="panel panel-primary tabla-mensajes ">

                <div class="panel-heading">Redactar mensaje</div>
                <div class="panel-body">
                    <?php if($error!=''){ ?>
                    <div class="alert alert-danger" role="alert"><?= $error ?></div>
                    <?php }elseif($acierto){ ?>
                        <div class="alert alert-success" role="alert"><?= $acierto ?></div>
                    <?php } ?>
                    <form method="POST" action="<?= $this->config->item('app_url') ?>index.php/mensajeria/enviarMensaje">

                        <div class="input-group">

                            <span class="input-group-addon" id="sizing-addon2">De</span>
                            <input name="emisor" readonly type="text" class="form-control" value="<?= $nombre; ?>" aria-describedby="sizing-addon1">


                            <span class="input-group-addon" id="sizing-addon2">Para</span>
                            <input name="receptor" type="text" class="form-control" value="<?= $nombreReceptor; ?>" aria-describedby="sizing-addon1">

                        </div>
                        <div class="input-group">

                            <span class="input-group-addon" id="sizing-addon2">Asunto</span>
                            <input name="asunto" type="text" class="form-control" aria-describedby="sizing-addon1">


                        </div>
                        <textarea name="mensaje" class="form-control" placeholder="Escribe tu mensaje" rows="12"></textarea>
                        <input class="btn btn-primary" type="submit" value="Enviar"/>
                    </form>
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

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>








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
    $(document).ready(function(){

    });


    
</script>
</body>
</html>
