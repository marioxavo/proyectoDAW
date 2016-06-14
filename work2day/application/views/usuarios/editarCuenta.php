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
		#passwordValue {
    visibility: hidden;
   
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

		<script type="text/javascript">
			$(document).ready(function(){
				var data=<?php echo json_encode($cuentaUsuario);?>;
				mostrarDatosCuenta(data);
			});
			function mostrarDatosCuenta(datos){

				$('#perfil').fadeOut(400,function(){
					$('#perfil').html('');
					$('#perfil').fadeIn(400);
					//$('#perfil').append('<div class="campo" id="nombre">'+datos['nombre']+'</div>');
					
					$('#perfil').append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" id="email">Email</div><h4><div id="emailValue" class="panel-body">'+datos['email']+'</div></h4></div></div>');
					$('#perfil').append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" id="password">Password</div><h4><div id="passwordValue" class="panel-body">'+datos['password']+'</div></h4></div></div>');
					
					$('#perfil').append('<div class="panelChange"><input class="btn btn-primary col-md-12 col-xs-12" type="button" value="Editar" onclick="editarCuenta()"></div>');
				});

			}
			function editarCuenta(){
				
				var email=document.getElementById('emailValue').innerHTML;
				var password=document.getElementById('passwordValue').innerHTML;
				
				$('#perfil').fadeOut(400,function(){
					$('#perfil').html('');
					$('#perfil').fadeIn(400);

					$('#perfil').append('<div class="col-md-7"><h4><label class="label label-primary" for="emailNuevo">Email:</label></h4><input type="text" class="form-control" id="emailNuevo" aria-describedby="basic-addon3" value="'+email+'"></div>');
					$('#perfil').append('<div class="col-md-7"><h4><label class="label label-primary" for="passwordNuevo">Password:</label></h4><input type="password" class="form-control" id="passwordNuevo" aria-describedby="basic-addon3" value="'+password+'"></div>');
					
					
					
					$('#perfil').append('<div class="botones col-md-7" col-xs-7 ><input class="btn btn-primary col-md-2 col-xs-2" type="button" value="Actualizar" onclick="actualizarCuenta()"><input class="btn btn-primary col-md-offset-1 col-md-2 col-xs-offset-1 col-xs-2" type="button" value="Volver" onclick="volverCuenta()"></div>');
				});

			}
			function actualizarCuenta(){
				var id_cuenta=<?php echo $cuentaUsuario['id_cuenta'];?>;
				var email=document.getElementById('emailNuevo').value;
				var password=document.getElementById('passwordNuevo').value;
				
				if(email=="" || password==""){
					$('#mensaje').fadeIn(400);
					$('#mensaje').html('Hay campos necesarios sin rellenar');
				}
				else{
					$.post("<?php echo $this->config->item('app_url')?>index.php/usuarios/actualizarCuenta",{id_cuenta:id_cuenta,email: email, password: password},function(data){
						$('#mensaje').fadeIn(400);
						$('#mensaje').html('');
						mostrarDatosCuenta(data);

					},'json');
				}
			}
			function volverCuenta(){
				var id_cuenta=<?php echo $cuentaUsuario['id_cuenta'];?>;
				$.post("<?php echo $this->config->item('app_url')?>index.php/usuarios/refrescarCuenta",{id_cuenta:id_cuenta},function(data){
					$('#mensaje').fadeIn(400);
					$('#mensaje').html('');
					mostrarDatosCuenta(data);

				},'json');
			}
		</script>
	</body>
</html>
