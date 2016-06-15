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
        var data=<?php echo json_encode($perfil);?>;
        mostrarDatosPerfil(data);
    });
    function mostrarDatosPerfil(datos){

        $('#perfil').fadeOut(400,function(){
            $('#perfil').html('');
            $('#perfil').fadeIn(400);
            //$('#perfil').append('<div class="campo" id="nombre">'+datos['nombre']+'</div>');
            if(datos['imagen']=="" || datos['imagen']==null){
            $('#perfil').append('<div class="row"><div class="col-xs-6 col-md-2"><img style="width: 150px; height: 200px; border-radius: 10px; margin-bottom: 20px; margin-left: 15px;" src="<?php echo $this->config->item('app_url').'template/img/favicon.png';?>"></img></div>');    
            }
            else{
            $('#perfil').append('<div class="row"><div class="col-xs-6 col-md-2"><img style="width: 150px; height: 200px; border-radius: 10px; margin-bottom: 20px; margin-left: 15px;" src="<?php echo $this->config->item('app_url').'template/img/usuarios/';?>'+datos['imagen']+'"></img></div>');
            }
            $('#perfil').append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" id="nombre">Nombre</div><h4><div id="nombreValue" class="panel-body">'+datos['nombre']+'</div></h4></div></div>');
            $('#perfil').append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" id="habilidades">Habilidades</div><h4><div id="habilidadesValue" class="panel-body">'+datos['habilidades']+'</div></h4></div></div>');
            $('#perfil').append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" id="estudios">Estudios</div><h4><div id="estudiosValue" class="panel-body">'+datos['estudios']+'</div></h4></div></div>');
            $('#perfil').append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" id="experiencia">Experiencia</div><h4><div id="experienciaValue" class="panel-body">'+datos['experiencia']+'</div></h4></div></div>');
        });

    }
</script>
</body>
</html>
