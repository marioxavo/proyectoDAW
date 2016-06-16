<!DOCTYPE html>
<html lang="en">
 <?php include("head.php"); ?>
     <style type="text/css">
										.panelChange{
								width: 50%;
								margin-left: auto;
								margin-right: auto;
							}
									.botones{
			margin-top: .5%;
		}
					</style>
    <!-- NAVBAR
================================================== -->
    <body class="colorFondo">
        <div class="navbar-wrapper">
            <div class="container">

                <nav class="navbar navbar-inverse navbar-static-top">
                    <?php include("cabecera.php"); ?>
                </nav>
               <div id="perfil"></div>
                <div id="mensaje"></div>
            </div>
        </div>





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
    <script type="text/javascript">
        $(document).ready(function(){
           var data=<?php echo json_encode($perfilUsuario);?>;
           mostrarDatosPerfil(data);
        });
        function mostrarDatosPerfil(datos){
            
            $('#perfil').fadeOut(400,function(){
                $('#perfil').html('');
                $('#perfil').fadeIn(400);
                //$('#perfil').append('<div class="campo" id="titulo">'+datos['titulo_completo']+'</div>');
															//$('#perfil').append('<div class="campo"><input type="button" value="Editar" onclick="editarPerfil()"></div>');
															//$('#perfil').append('<div class="campo" id="descripcion">'+datos['descripcion']+'</div>');
                if(datos['imagen']=="" || datos['imagen']==null){
					$('#perfil').append('<div class="row"><div class="col-xs-6 col-md-2" id="imagenUser"><img style="width: 150px; height: 200px; border-radius: 10px; margin-bottom: 20px; margin-left: 15px;" src="<?php echo $this->config->item('app_url').'template/img/favicon.png'; ?>"></img></div><div class="col-xs-6 col-md-2"><form method="POST" action="<?php echo $this->config->item('app_url').'index.php/usuarios/insertarImagenE/'; ?>'+datos['id_perfil']+'" id="formularioImagen" enctype="multipart/form-data"><input name="imagen" type="file" accept="image/*" /><input type="submit" value="Enviar imagen" /></div></form></div>');
                    }
                    else{
                    $('#perfil').append('<div class="row"><div class="col-xs-6 col-md-2" id="imagenUser"><img style="width: 150px; height: 200px; border-radius: 10px; margin-bottom: 20px; margin-left: 15px;" src="<?php echo $this->config->item('app_url').'template/img/usuarios/'; ?>'+datos['imagen']+'"></img></div><div class="col-xs-6 col-md-2"><form method="POST" action="<?php echo $this->config->item('app_url').'index.php/usuarios/insertarImagenE/'; ?>'+datos['id_perfil']+'" id="formularioImagen" enctype="multipart/form-data"><input name="imagen" type="file" accept="image/*" /><input type="submit" value="Enviar imagen" /></div></form></div>');
                    }
															$('#perfil').append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" id="nombre">Nombre de Empresa</div><h4><div id="titulo" class="panel-body">'+datos['titulo_completo']+'</div></h4></div></div>');
															$('#perfil').append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" id="nombre">Descripción</div><h4><div id="descripcion" class="panel-body">'+datos['descripcion']+'</div></h4></div></div>');
															$('#perfil').append('<div class="panelChange"><input class="btn btn-primary col-md-12 col-xs-12" type="button" value="Editar" onclick="editarPerfil()"></div>');
												});
                
                
                
           
        
        }
        function editarPerfil(){
            var titulo=document.getElementById('titulo').innerHTML;
            var descripcion=document.getElementById('descripcion').innerHTML;
            
            $('#perfil').fadeOut(400,function(){
                $('#perfil').html('');
                $('#perfil').fadeIn(400);
                
               	$('#perfil').append('<div class="col-md-7"><h4><label class="label label-primary" for="tituloNuevo">Título:</label></h4><input type="text" class="form-control" id="tituloNuevo" aria-describedby="basic-addon3" value="'+titulo+'"></div>');
													
																$('#perfil').append('<div class="col-md-7"><h4><label class="label label-primary" for="descripcionNuevo">Descripción:</label></h4><textarea class="form-control" rows="5" id="descripcionNuevo">'+descripcion+'</textarea></div>');
													
														$('#perfil').append('<div class="botones col-md-7" col-xs-7 ><input class="btn btn-primary col-md-2 col-xs-2" type="button" value="Actualizar" onclick="actualizarPerfil()"><input class="btn btn-primary col-md-offset-1 col-md-2 col-xs-offset-1 col-xs-2" type="button" value="Volver" onclick="volverPerfil()"></div>');
														});
													
 
        }
        function actualizarPerfil(){
            var id_usuario=<?php echo $perfilUsuario['id_usuario'];?>;
             var titulo=document.getElementById('tituloNuevo').value;
            var descripcion=document.getElementById('descripcionNuevo').value;
            if(titulo=="" || descripcion==""){
                $('#mensaje').fadeIn(400);
                $('#mensaje').html('Hay campos necesarios sin rellenar');
            }
            else{
                $.post("<?php echo $this->config->item('app_url')?>index.php/usuarios/actualizarPerfilE",{id_usuario:id_usuario,titulo:titulo,descripcion:descripcion},function(data){
                    $('#mensaje').fadeIn(400);
                    $('#mensaje').html('');
                    mostrarDatosPerfil(data);
                    
                },'json');
            }
        }
            function volverPerfil(){
                 var id_usuario=<?php echo $perfilUsuario['id_usuario'];?>;
                $.post("<?php echo $this->config->item('app_url')?>index.php/usuarios/refrescarPerfilE",{id_usuario:id_usuario},function(data){
                    $('#mensaje').fadeIn(400);
                    $('#mensaje').html('');
                    mostrarDatosPerfil(data);
                    
                },'json');
            }
        </script>
    </body>
</html>
