<body class="colorFondo">
<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
           <?php include("cabecera.php"); ?>
        </nav>
        <div class="row">
          
            <div id="ofertas">
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
        var ofertas=<?= json_encode($ofertas);?>;
        mostrarOfertas(ofertas);
    });

    function mostrarOfertas(ofertas){
        
        $('#ofertas').fadeOut(400,function(){
           $('#ofertas').html('');
           $('#ofertas').fadeIn(400);
            
            if(ofertas[0].length!=0){
                for(i=0;i<ofertas.length;i++){
                    $('#ofertas').append('<div id="oferta-'+ofertas[i]['id_oferta']+'"></div>');
                    $('#oferta-'+ofertas[i]['id_oferta']).append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" id="nombre">'+ofertas[i]['nombre_empresa']+'</div><h4><div class="titulo_oferta" class="panel-body">'+ofertas[i]['titulo_oferta']+'</div></h4><h4><div class="texto_oferta" class="panel-body">'+ofertas[i]['texto_oferta']+'</div></h4><h4><div class="categoria" class="panel-body">'+ofertas[i]['categoria']+'</div></h4><h4><div class="municipio" class="panel-body">'+ofertas[i]['provincia']+'</div></h4><h4><div id="candidatos" class="panel-body">'+ofertas[i]['candidatosNombres']+'</div></h4></div></div>');
                    $('#oferta-'+ofertas[i]['id_oferta']).append('<div class="botones col-md-7" col-xs-7 style="margin-bottom: 20px;"><input class="btn btn-primary col-md-2 col-xs-2" type="button" value="Borrar" onclick="borrarOferta('+ofertas[i]['id_oferta']+')"></div>');
                    
                }
            }
            
            
        });
    }
    function borrarOferta(id){
         $.post('<?php echo $this->config->item('app_url').'index.php/administracion/borrarOferta/';?>'+id,function(data){
                
                mostrarOfertas(data);
           },'json');
    }
   
   
    
</script>
</body>
</html>