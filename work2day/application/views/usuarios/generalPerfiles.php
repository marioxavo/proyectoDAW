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
            <div id="perfiles" ></div>
            
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
        var data=<?php echo json_encode($perfiles);?>;
        mostrarDatosPerfil(data);
    });
    function mostrarDatosPerfil(datos){

        
            if(datos[0].length!=0){
                for(i=0;i<datos.length;i++){
                    var nombreUser=datos[i]['nombre_user'];
                    $('#perfiles').append('<div id="perfil-'+datos[i]['id_perfil']+'"></div>');
                    if(datos[i]['imagen']=="" || datos[i]['imagen']==null){
                    $('#perfil-'+datos[i]['id_perfil']).append('<div class="row"><div class="col-xs-6 col-md-2"><img style="width: 150px; height: 200px; border-radius: 10px; margin-bottom: 20px; margin-left: 15px;" src="<?php echo $this->config->item('app_url').'template/img/favicon.png';?>"></img></div>');    
                    }
                    else{
                    $('#perfil-'+datos[i]['id_perfil']).append('<div class="row"><div class="col-xs-6 col-md-2"><img style="width: 150px; height: 200px; border-radius: 10px; margin-bottom: 20px; margin-left: 15px;" src="<?php echo $this->config->item('app_url').'template/img/usuarios/';?>'+datos[i]['imagen']+'"></img></div>');
                    }
                    $('#perfil-'+datos[i]['id_perfil']).append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" id="nombre">Nombre</div><h4><div id="nombreValue" class="panel-body">'+datos[i]['nombre']+'</div></h4></div></div>');
                    $('#perfil-'+datos[i]['id_perfil']).append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" id="habilidades">Habilidades</div><h4><div id="habilidadesValue" class="panel-body">'+datos[i]['habilidades']+'</div></h4></div></div>');
                    $('#perfil-'+datos[i]['id_perfil']).append('<div class="col-md-4"><div class="panel panel-primary "><div class="panel-heading" id="estudios">Estudios</div><h4><div id="estudiosValue" class="panel-body">'+datos[i]['estudios']+'</div></h4></div></div>');
                    $('#perfil-'+datos[i]['id_perfil']).append('<div class="col-md-4"><div class="panel panel-primary "><div class="panel-heading" id="experiencia">Experiencia</div><h4><div id="experienciaValue" class="panel-body">'+datos[i]['experiencia']+'</div></h4></div></div>');
                    $('#perfil-'+datos[i]['id_perfil']).append('<div class="col-md-4"><div class="panel panel-primary "><div class="panel-heading" id="ciudad">Ciudad</div><h4><div id="ciudadValue" class="panel-body">'+datos[i]['provincia']+'</div></h4></div></div>');
                    $('#perfil-'+datos[i]['id_perfil']).append('<div class="botones col-md-12 col-xs-12" style="margin-bottom: 20px;"><input class="btn btn-primary col-md-2 col-xs-2" type="button" value="Contactar" onclick=contactar("'+nombreUser+'")></div>');
                }
            }
        else{
             $('#perfiles').append('<div class="alert alert-danger" role="alert">No hay trabajadores con estas características disponibles</div>');
        }
            
        
        

    }
    function contactar(nombre){
        window.location="<?php echo $this->config->item('app_url').'index.php/mensajeria/redactarMensaje?nr=';?>"+nombre;
    }
    
    
    </script>
     </body>
</html>