<body class="colorFondo">
<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
           <?php include("cabecera.php"); ?>
        </nav>
        <div class="row">
          
            <div id="usuarios">
            </div>
            

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
        var usuarios=<?= $usuarios;?>;
        mostrarUsuarios(usuarios);
    });

    function mostrarUsuarios(usuarios){
        
        $('#usuarios').fadeOut(400,function(){
           $('#usuarios').html('');
           $('#usuarios').fadeIn(400);
            
            if(usuarios[0].length!=0){
                for(i=0;i<usuarios.length;i++){
                    $('#usuarios').append('<div id="usuario-'+usuarios[i]['id']+'"></div>');
                    $('#usuario-'+usuarios[i]['id']).append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" >Id</div><h4><div  class="panel-body">'+usuarios[i]['id']+'</div></h4></div></div>');
                    $('#usuario-'+usuarios[i]['id']).append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" >Nombre</div><h4><div class="panel-body">'+usuarios[i]['nombre']+'</div></h4></div></div>');
                    $('#usuario-'+usuarios[i]['id']).append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" >Email</div><h4><div class="panel-body">'+usuarios[i]['email']+'</div></h4></div></div>');
					$('#usuario-'+usuarios[i]['id']).append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" >Grupo usuarios</div><h4><div class="panel-body">'+usuarios[i]['grupo_usuarios']+'</div></h4></div></div>');
                    $('#usuario-'+usuarios[i]['id']).append('<div class="botones col-md-7" col-xs-7 style="margin-bottom: 20px;"><input class="btn btn-primary col-md-2 col-xs-2" type="button" value="Borrar" onclick="borrarUsuario('+usuarios[i]['id']+')"></div>');
                    
                }
            }
            
            
        });
    }
    function borrarUsuario(id){
         $.post('<?php echo $this->config->item('app_url').'index.php/administracion/borrarUsuario/';?>'+id,function(data){
                
                mostrarUsuarios(data);
           },'json');
    }
   
   
    
</script>
</body>
</html>