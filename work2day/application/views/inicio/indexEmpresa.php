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
					<h2 style="color:white;" class="col-md-offset-3 col-md-6">Empieza buscando trabajadores que se ajusten a tus exigencias</h2>
					<div class="col-md-6 col-md-offset-3">
						 <div class="input-group" style="width:100%;">
                            <input type="text" class="form-control" aria-label="..." id="inputBusc">
                             <select id="sCiudad" class="form-control" style="overflow-y: scroll; max-height:250px;">
                            <option value=0>Todas</option>
                            <?php foreach($provincias as $provincia){ ?>
                                        <option value="<?= $provincia['id'];?>"><?= $provincia['provincia']; ?></option>
                                    <?php } ?>
                            </select>
                             <input type="button" class="btn btn-primary" id="buscarTexto" onclick="buscar()" value="Buscar" style="width:100%; margin-bottom: 20px;;">
                        
                        </div> 
						</div><!-- /input-group -->

					</div><!-- /.col-lg-6 -->
				<!--<div class="row">
					<section id="miSlide" class="carousel slide">
						<ol class="carousel-indicators">
							<li data-target="#miSlide" data-slide-to="0" class="active"></li>
							<li data-target="#miSlide" data-slide-to="1"></li>
							<li data-target="#miSlide" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<img class="adaptar" src="<?php echo $this->config->item('app_url'); ?>template/img/img1.jpg">
							</div>
							<div class="item">
								<img class="adaptar" src="<?php echo $this->config->item('app_url'); ?>template/img/img2.jpg">
							</div>
							<div class="item">
								<img class="adaptar" src="<?php echo $this->config->item('app_url'); ?>template/img/img3.jpg">
							</div>
						</div>

						<a href="#miSlide" class="left carousel-control" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
						<a href="#miSlide" class="right carousel-control" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
					</section>
				</div>-->
				<!-- START THE FEATURETTES -->

				<hr class="featurette-divider">

				<div class="row featurette">
					<div class="col-md-7">
						<h2 style="color: black;" class="featurette-heading">Publica ofertas. <span style="color: black" class="text-muted"></span></h2>
						<p style="color: white;" class="lead">Encuentra trabajadores que se ajusten a tus necesidades, en Work2Day podrás encontrar una gran cantidad de profesionales para tu empresa.</p>
					</div>
					<div class="col-md-5">
						<img style="height: 200px" class="featurette-image img-responsive center-block" src="<?php echo $this->config->item('app_url').'template/img/img1.jpg';?>" alt="Generic placeholder image">
					</div>
				</div>

				<hr class="featurette-divider">

				<div class="row featurette">
					<div class="col-md-5">
						<img style="height: 250px; width: 350px;" class="featurette-image img-responsive center-block" src="<?php echo $this->config->item('app_url').'template/img/img2.jpg';?>" alt="Generic placeholder image">
					</div>
					<div class="col-md-7">
						<h2 style="color: white;" class="featurette-heading">Conéctate. <span style="color: black" class="text-muted">Relaciónate.</span></h2>
						<p style="color: white;" class="lead">Podrás mantener el contacto con los trabajadores que se apunten a tus ofertas. Contacta con ellos de manera simple, rápida y eficaz.</p>
					</div>

				</div>

				<hr class="featurette-divider">
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

		<script src="<?php echo $this->config->item('app_url').'template/js/index.js';?>"></script>

		<script>
			$(document).ready(function(){
				$('.carousel').carousel({
					interval:4000
				})
			})

		</script>



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
			 $('#menu1').addClass('active');
		 });
        function buscar(){
            var texto="";
            texto=document.getElementById('inputBusc').value;
            var ciudad=document.getElementById('sCiudad').value;
            window.location='<?php echo $this->config->item('app_url').'index.php/busquedas/buscarPerfiles?texto=';?>'+texto+'&ciudad='+ciudad;
        }
        </script>
	</body>
</html>

