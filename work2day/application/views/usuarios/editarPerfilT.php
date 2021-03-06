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
				<div class="row">
					<div id="perfil" ></div>
					<div id="mensaje"></div>
				</div>

			</div>
		</div>






	






		<!-- Bootstrap core JavaScript
================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
		<script src="<?php echo $this->config->item('app_url').'template/bootstrap/js/jquery.min.js';?>"></script>
		<script>window.jQuery || document.write('<script src="<?php echo $this->config->item('app_url').'template/bootstrap/js/vendor/jquery.min.js';?>"><\/script>')</script>
		<script src="<?php echo $this->config->item('app_url').'template/bootstrap/js/bootstrap.min.js';?>"></script>
	

		<script type="text/javascript">
			$(document).ready(function(){
				var data=<?php echo json_encode($perfilUsuario);?>;
				mostrarDatosPerfil(data);

					$('#menu6').addClass('active');
			});
			function mostrarDatosPerfil(datos){

				$('#perfil').fadeOut(400,function(){
					$('#perfil').html('');
					$('#perfil').fadeIn(400);
					//$('#perfil').append('<div class="campo" id="nombre">'+datos['nombre']+'</div>');
                    if(datos['imagen']=="" || datos['imagen']==null){
					$('#perfil').append('<div class="row"><div class="col-xs-6 col-md-2" id="imagenUser"><img style="width: 150px; height: 200px; border-radius: 10px; margin-bottom: 20px; margin-left: 15px;" src="<?php echo $this->config->item('app_url').'template/img/favicon.png'; ?>"></img></div><div class="col-xs-6 col-md-2"><form method="POST" action="<?php echo $this->config->item('app_url').'index.php/usuarios/insertarImagenT/'.$id_usuario.'/'; ?>'+datos['id_perfil']+'" id="formularioImagen" enctype="multipart/form-data"><input name="imagen" type="file" accept="image/jpg" /><input type="submit" value="Enviar imagen" /></div></form></div>');
                    }
                    else{
                    $('#perfil').append('<div class="row"><div class="col-xs-6 col-md-2" id="imagenUser"><img style="width: 150px; height: 200px; border-radius: 10px; margin-bottom: 20px; margin-left: 15px;" src="<?php echo $this->config->item('app_url').'template/img/usuarios/'; ?>'+datos['imagen']+'"></img></div><div class="col-xs-6 col-md-2"><form method="POST" action="<?php echo $this->config->item('app_url').'index.php/usuarios/insertarImagenT/'.$id_usuario.'/'; ?>'+datos['id_perfil']+'" id="formularioImagen" enctype="multipart/form-data"><input name="imagen" type="file" accept="image/*" /><input type="submit" value="Enviar imagen" /></div></form></div>');
                    }
					$('#perfil').append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" id="nombre">Nombre</div><h4><div id="nombreValue" class="panel-body">'+datos['nombre']+'</div></h4></div></div>');
					$('#perfil').append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" id="habilidades">Habilidades</div><h4><div id="habilidadesValue" class="panel-body">'+datos['habilidades']+'</div></h4></div></div>');
					$('#perfil').append('<div class="col-md-4"><div class="panel panel-primary "><div class="panel-heading" id="estudios">Estudios</div><h4><div id="estudiosValue" class="panel-body">'+datos['estudios']+'</div></h4></div></div>');
					$('#perfil').append('<div class="col-md-4"><div class="panel panel-primary "><div class="panel-heading" id="experiencia">Experiencia</div><h4><div id="experienciaValue" class="panel-body">'+datos['experiencia']+'</div></h4></div></div>');
					$('#perfil').append('<div class="col-md-4"><div class="panel panel-primary "><div class="panel-heading" id="ciudad">Ciudad</div><h4><div id="ciudadValue" class="panel-body">'+datos['provincia']+'</div></h4></div></div>');
					$('#perfil').append('<div class="panelChange"><input class="btn btn-primary col-md-12 col-xs-12" type="button" value="Editar" onclick="editarPerfil()"></div>');
				});

			}
			function editarPerfil(){
				var nombre=document.getElementById('nombreValue').innerHTML;
				var habilidades=document.getElementById('habilidadesValue').innerHTML;
				var estudios=document.getElementById('estudiosValue').innerHTML;
				var experiencia=document.getElementById('experienciaValue').innerHTML;
				$('#perfil').fadeOut(400,function(){
					$('#perfil').html('');
					$('#perfil').fadeIn(400);
					$('#perfil').append('<div class="col-md-7"><h4><label class="label label-primary" for="nombreNuevo">Nombre:</label></h4><input type="text" class="form-control" id="nombreNuevo" aria-describedby="basic-addon3" value="'+nombre+'"></div>');
					$('#perfil').append('<div class="col-md-7"><h4><label class="label label-primary" for="habilidadesNuevo">Habilidades:</label></h4><textarea class="form-control" rows="5" id="habilidadesNuevo">'+habilidades+'</textarea></div>');
					$('#perfil').append('<div class="col-md-7"><h4><label class="label label-primary" for="estudiosNuevo">Estudios:</label></h4><textarea class="form-control" rows="5" id="estudiosNuevo">'+estudios+'</textarea></div>');
					$('#perfil').append('<div class="col-md-7"><h4><label class="label label-primary" for="experienciaNuevo">Experiencia:</label></h4><textarea class="form-control" rows="5" id="experienciaNuevo">'+experiencia+'</textarea></div>');
					$('#perfil').append('<div class="col-md-7"><h4><label class="label label-primary" for="ciudadNuevo">Ciudad:</label></h4> <select class="form-control" id="ciudadNuevo" name="ciudad"><?php foreach($provincias as $provincia){ ?><option value="<?= $provincia['id'];?>"><?= $provincia['provincia']; ?></option><?php } ?></select></div>');
					
					
					$('#perfil').append('<div class="botones col-md-7" col-xs-7 ><input class="btn btn-primary col-md-2 col-xs-2" type="button" value="Actualizar" onclick="actualizarPerfil()"><input class="btn btn-primary col-md-offset-1 col-md-2 col-xs-offset-1 col-xs-2" type="button" value="Volver" onclick="volverPerfil()"></div>');
				});

			}
			function actualizarPerfil(){
				var id_usuario=<?php echo $perfilUsuario['id_usuario'];?>;
				var nombre=document.getElementById('nombreNuevo').value;
				var habilidades=document.getElementById('habilidadesNuevo').value;
				var estudios=document.getElementById('estudiosNuevo').value;
				var experiencia=document.getElementById('experienciaNuevo').value;
				var ciudad=document.getElementById('ciudadNuevo').value;
				if(nombre=="" || habilidades=="" || estudios=="" || experiencia==""){
					$('#mensaje').fadeIn(400);
					$('#mensaje').html('Hay campos necesarios sin rellenar');
				}
				else{
					$.post("<?php echo $this->config->item('app_url')?>index.php/usuarios/actualizarPerfilT",{id_usuario:id_usuario,nombre:nombre,habilidades: habilidades, estudios: estudios, experiencia:experiencia,ciudad: ciudad},function(data){
						$('#mensaje').fadeIn(400);
						$('#mensaje').html('');
						mostrarDatosPerfil(data);

					},'json');
				}
			}
			function volverPerfil(){
				var id_usuario=<?php echo $perfilUsuario['id_usuario'];?>;
				$.post("<?php echo $this->config->item('app_url')?>index.php/usuarios/refrescarPerfilT",{id_usuario:id_usuario},function(data){
					$('#mensaje').fadeIn(400);
					$('#mensaje').html('');
					mostrarDatosPerfil(data);

				},'json');
			}
		</script>
	</body>
</html>
