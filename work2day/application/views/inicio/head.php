<DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="<?php echo $this->config->item('app_url').'template/img/favicon.png';?>">

        <title>Work2Day</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo $this->config->item('app_url').'template/bootstrap/css/bootstrap.min.css';?>" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="<?php echo $this->config->item('app_url').'template/bootstrap/css/ie10-viewport-bug-workaround.css';?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $this->config->item('app_url').'template/css/styleLogin.css';?>">
        <link rel="stylesheet" href="<?php echo $this->config->item('app_url').'template/css/style.css';?>">


        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="<?php echo $this->config->item('app_url').'template/bootstrap/js/ie-emulation-modes-warning.js';?>"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

        <!-- Custom styles for this template -->
        <link href="<?php echo $this->config->item('app_url').'template/bootstrap/css/carousel.css';?>" rel="stylesheet">
    </head>
    <div class="container">
    <nav class="navbar navbar-inverse navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">Work2Day</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="<?php echo $this->config->item('app_url')?>index.php/inicio/portada">Inicio</a></li>
                                <li><a href="#">Buscar ofertas</a></li>
                                <li><a href="#about">Mis ofertas</a></li>
                                <li><a href="<?php echo $this->config->item('app_url')?>index.php/mensajeria">Mensajes</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $nombre ?><span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Mi cuenta</a></li>
                                        <?php if($grupo_usuario==1){
                                        ?>
                                        <li><a href="<?php echo $this->config->item('app_url').'index.php/usuarios/editarPerfilT';?>">Editar Perfil</a></li>
                                        <?php }
                                        elseif($grupo_usuario==2){
                                            ?>
                                        <li><a href="<?php echo $this->config->item('app_url').'index.php/usuarios/editarPerfilE';?>">Editar Perfil</a></li>
                                        <?php
                                        }
                                        ?>
                                        
                                        <li><a href="<?php echo $this->config->item('app_url').'index.php/inicio/logOut';?>">Cerrar sesión</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
        </div>