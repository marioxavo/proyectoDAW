<?php include("head.php"); ?>
    <!-- NAVBAR
================================================== -->
<style type="text/css">
	#redactarBtn{
		margin-bottom: 5%;
	}
	.ee{
		background:lightgrey;
	}
</style>
    <body class="colorFondo">
        <div class="navbar-wrapper">
            <div class="container">

                <nav class="navbar navbar-inverse navbar-static-top">
                    <?php include("cabecera.php"); ?>
                </nav>
                <div class="row">
                    
                   <div class="panel-mensajes col-md-2 col-sm-3 col-xs-12 col-lg-2">

                    <ul class="list-group " style="list-style:none;">

																								<li><a id="redactarBtn" class="btn btn-primary" href="<?php echo $this->config->item('app_url') ?>index.php/mensajeria/redactarMensaje" role="button">Redactar mensaje</a></li>
                        <li id="RecibidosBtn" onclick="cambiarTablaMensajes(0);" style="cursor: pointer" class="list-group-item"><span id="numRecibidos" class="badge"></span>Recibidos</li>
                        <li id="EnviadosBtn" onclick="cambiarTablaMensajes(1);" style="cursor: pointer" class="list-group-item"><span class="badge"></span>Enviados</li>
                    </ul>
                    </div>
                    <div class="col-md-10 col-sm-9 col-xs-12 col-lg-10">
                    <div id="divMensajes" class="panel panel-primary tabla-mensajes">
                       <div class="panel-heading">Recibidos</div>
                        <table id="mensajes" class="table">
                            <tr><td width="25%">De</td><td>Asunto</td></tr>

                        </table>
                    </div>
                    </div>
                    <div class="col-md-10 col-sm-9 col-xs-12 col-lg-10">
                    <div id="divEnviados" style="display:none;" class="panel panel-primary tabla-mensajes">
                        <div class="panel-heading">Enviados</div>
                        <table id="mensajesEnv" class="table">
                            <tr><td width="25%">Para</td><td>Asunto</td></tr>

                        </table>
                    </div>
                    </div>
                    
                </div>
                <div class="row">
                    <footer style="color: white;">
                        <p class="pull-right"><a style="color: black;" href="#">Ir arriba</a></p>
                        <p>&copy; 2016 Work2Day, S.A. &middot; </p>
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
														$('#RecibidosBtn').addClass("Active");
                 var mensajes=<?= $mensajes; ?>;
                 var mensajesEnv=<?= $mensajesEnviados; ?>;
                 var j=0;
                 if(mensajes[0]){
                     for(var i=0;i<mensajes.length;i++){
                         $('#mensajes').append('<tr id="mensaje'+i+'"></tr>');
																						
                         $('#mensaje'+i).append('<td id="columna1'+i+'" width="25%">'+mensajes[i]['nombre']+'</td><td id="columna2'+i+'"><a href="<?= $this->config->item("app_url"); ?>index.php/mensajeria/leermensaje/'+mensajes[i]['id_mensaje']+'">'+mensajes[i]['asunto']+'</a></td><td id="columna3'+i+'"><input type="button" class="btn btn-primary col-xs-12 col-sm-6 col-md-3 col-lg-3" value="Responder" onclick=responder("'+mensajes[i]['nombre']+'") style="margin-right: 6px;"/><input type="button" class="btn btn-primary col-xs-12 col-sm-6 col-md-3 col-lg-3" onclick="borrar('+mensajes[i]['id_mensaje']+')" value="Borrar"/></td>');
                         if(mensajes[i]['leido']==0){
                             j++;
																										$('#columna1'+i).addClass("ee");
																										$('#columna2'+i).addClass("ee");
																										$('#columna3'+i).addClass("ee");
                         }else{
																										
																									}
                     }
                     $('#numRecibidos').html(j);
                 }
                 if(mensajesEnv[0]){
                     for(var i=0;i<mensajesEnv.length;i++){
                         $('#mensajesEnv').append('<tr id="mensajeEnv'+i+'"></tr>');
                         $('#mensajeEnv'+i).append('<td width="25%">'+mensajesEnv[i]['nombre']+'</td><td>'+mensajesEnv[i]['asunto']+'</td>');
                     }
                 }


                     $('#menu4').addClass('active');

             });

            function cambiarTablaMensajes(i){
                if(i==0){
																				$('#EnviadosBtn').removeClass("Active");
																				$('#RecibidosBtn').addClass("Active");
                    $('#divMensajes').show();
                    $('#divEnviados').hide();
                }
                if(i==1){
                    $('#divMensajes').hide();
																				$('#RecibidosBtn').removeClass("Active");
																				$('#EnviadosBtn').addClass("Active");
                    $('#divEnviados').show();
                }
            }
            function responder(nombre){
                window.location="<?php echo $this->config->item('app_url').'index.php/mensajeria/redactarMensaje?nr=';?>"+nombre;
            }
            function borrar(id){
                window.location="<?php echo $this->config->item('app_url').'index.php/mensajeria/borrarMensaje/';?>"+id;
            }
        </script>
    </body>
    </html>
