<div class="container">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?php echo $this->config->item('app_url')?>index.php/inicio/portada">Work2Day</a>
	</div>
	<div id="navbar" class="navbar-collapse collapse">
		<ul class="lista nav navbar-nav">
			
            <?php if($id_grupo_usuarios==1){
            ?>
            <li class="active"><a href="<?php echo $this->config->item('app_url')?>index.php/inicio/portada">Inicio</a></li>
            <li><a href="<?php echo $this->config->item('app_url')?>index.php/ofertas/sacarOfertas">Buscar ofertas</a></li>
			<li><a href="#about">Mis ofertas</a></li>
			<li><a href="<?php echo $this->config->item('app_url')?>index.php/mensajeria">Mensajes</a></li>
			<li><a href="<?php echo $this->config->item('app_url')?>index.php/mensajeria/redactarMensajeAdmin">Contacto</a></li>
			<li class="dropdown derecha">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $nombre ?><span class="caret"></span></a>
				<ul class="dropdown-menu">
					
					<li><a href="<?php echo $this->config->item('app_url').'index.php/usuarios/editarCuenta';?>">Mi cuenta</a></li>
					<li><a href="<?php echo $this->config->item('app_url').'index.php/usuarios/editarPerfilT';?>">Editar Perfil</a></li>
					<li><a href="<?php echo $this->config->item('app_url').'index.php/inicio/logOut';?>">Cerrar sesión</a></li>
				</ul>
			</li>
            <?php
            }
            elseif($id_grupo_usuarios==2){
                ?>
           <li class="active"><a href="<?php echo $this->config->item('app_url')?>index.php/inicio/portada">Inicio</a></li>
			<li><a href="<?php echo $this->config->item('app_url')?>index.php/ofertas">Mis ofertas</a></li>
			<li><a href="<?php echo $this->config->item('app_url')?>index.php/mensajeria">Mensajes</a></li>
			<li><a href="<?php echo $this->config->item('app_url')?>index.php/mensajeria/redactarMensajeAdmin">Contacto</a></li>
			<li class="dropdown derecha">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $nombre ?><span class="caret"></span></a>
				<ul class="dropdown-menu">
     <li><a href="<?php echo $this->config->item('app_url').'index.php/usuarios/editarCuenta';?>">Mi cuenta</a></li>
					<li><a href="<?php echo $this->config->item('app_url').'index.php/usuarios/editarPerfilT';?>">Editar Perfil</a></li>
					<li><a href="<?php echo $this->config->item('app_url').'index.php/inicio/logOut';?>">Cerrar sesión</a></li>
				</ul>
			</li>
            <?php
            }
            elseif($id_grupo_usuarios==3){
                ?>
           
			<li><a href="<?php echo $this->config->item('app_url')?>index.php/administracion">Usuarios</a></li>
			<li><a href="<?php echo $this->config->item('app_url')?>index.php/administracion/ofertas">Ofertas</a></li>
			<li><a href="<?php echo $this->config->item('app_url')?>index.php/mensajeria">Mensajes</a></li>
			<li class="dropdown derecha">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $nombre ?><span class="caret"></span></a>
				<ul class="dropdown-menu">
     <li><a href="<?php echo $this->config->item('app_url').'index.php/usuarios/editarCuenta';?>">Mi cuenta</a></li>
					<li><a href="<?php echo $this->config->item('app_url').'index.php/inicio/logOut';?>">Cerrar sesión</a></li>
				</ul>
			</li>
            <?php
            }
            ?>
            ?>
			
		</ul>
	</div>
</div>