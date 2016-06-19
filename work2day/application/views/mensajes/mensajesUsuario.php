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
                <h3 style="color:white;" class="col-md-12">Mensajes</h3>
                </div>
                <div class="row">
                    
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div id="divMensajes" class="panel panel-primary tabla-mensajes">
                       <div class="panel-heading">Recibidos</div>
                        <table id="mensajes" class="table">
                            

                        </table>
                    </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                    <div id="divEnviados" class="panel panel-primary tabla-mensajes">
                        <div class="panel-heading">Enviados</div>
                        <table id="mensajesEnv" class="table">
                           

                        </table>
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

        <script src="<?php echo $this->config->item('app_url').'template/bootstrap/js/index.js'; ?>"></script>






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
                 var mensajes=<?= $recibidos; ?>;
                 var mensajesEnv=<?= $enviados; ?>;
                 var j=0;
                 if(mensajes[0].length!=0){
                     for(var i=0;i<mensajes.length;i++){
                        $('#mensajes').append('<tr><td width="25%">De</td><td>Asunto</td></tr>');
                        $('#mensajes').append('<tr id="mensaje'+i+'"></tr>');
                         $('#mensaje'+i).append('<td width="25%">'+mensajes[i]['nombre']+'</td><td>'+mensajes[i]['asunto']+'</td>');
                         $('#mensajes').append('<tr><td width="25%">Mensaje</td><td>Fecha</td></tr>');
                         $('#mensajes').append('<tr style="margin-bottom:"30px;"><td width="25%">'+mensajes[i]['mensaje']+'</td><td>'+mensajes[i]['fecha']+'</td></tr>');
                         
                     }
                     
                 }
                 if(mensajesEnv[0].length!=0){
                     for(var i=0;i<mensajesEnv.length;i++){
                          $('#mensajesEnv').append('<tr><td width="25%">Para</td><td>Asunto</td></tr>');
                         $('#mensajesEnv').append('<tr id="mensajeEnv'+i+'"></tr>');
                         $('#mensajeEnv'+i).append('<td width="25%">'+mensajesEnv[i]['nombre']+'</td><td>'+mensajesEnv[i]['asunto']+'</td>');
                         $('#mensajesEnv').append('<tr><td width="25%">Mensaje</td><td>Fecha</td></tr>');
                         $('#mensajesEnv').append('<tr style="margin-bottom:"30px;"><td width="25%">'+mensajesEnv[i]['mensaje']+'</td><td>'+mensajesEnv[i]['fecha']+'</td></tr>');
                     }
                 }
             });

        </script>
    </body>
    </html>