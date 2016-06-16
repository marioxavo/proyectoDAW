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
					<h2 style="color:white;" class="col-md-offset-3 col-md-6">Empieza busacando trabajadores que se ajusten a tus exigencias</h2>
					<div class="col-md-6 col-md-offset-3">
						 <div class="input-group" style="width:100%;">
                            <input type="text" class="form-control" aria-label="..." id="inputBusc"><input type="button" class="btn btn-primary" id="buscarTexto" onclick="buscar()" value="Buscar" style="width:100%;">
                        
                        </div> 
						</div><!-- /input-group -->

					</div><!-- /.col-lg-6 -->
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
        function buscar(){
            var texto="";
            texto=document.getElementById('inputBusc').value;
            window.location='<?php echo $this->config->item('app_url').'index.php/busquedas/buscarPerfiles/';?>'+texto;
        }
        </script>
	</body>
</html>

