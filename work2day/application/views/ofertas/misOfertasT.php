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
                <p class="pull-right"><a style="color: black;" href="#">Ir arriba</a></p>
                <p>&copy; 2016 Work2Day, S.A. &middot; </p>
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
        $('#menu3').addClass('active');

    });

    function mostrarOfertas(ofertas){
        
        $('#ofertas').fadeOut(400,function(){
           $('#ofertas').html('');
           $('#ofertas').fadeIn(400);
            
            if(ofertas[0].length!=0){
                for(i=0;i<ofertas.length;i++){
                    $('#ofertas').append('<div id="oferta-'+ofertas[i]['id_oferta']+'"></div>');
                    $('#oferta-'+ofertas[i]['id_oferta']).append('<div class="col-md-8"><div class="panel panel-primary "><div class="panel-heading" class="titulo_oferta" style="font-size: 2em;">'+ofertas[i]['titulo_oferta']+'</div><h4><div  id="nombre" class="panel-body"><b>Empresa:</b><br> '+ofertas[i]['nombre_empresa']+' → <a href="<?php echo $this->config->item('app_url'); ?>index.php/mensajeria/redactarMensaje?nr='+ofertas[i]['nombre_empresa']+'">Contactar</a> <br><a href="<?php echo $this->config->item('app_url'); ?>index.php/ofertas/verPerfilE/'+ofertas[i]['id_empresa']+'">Ver perfil de la empresa</a></div></h4><h4><div  class="panel-body "><b>Descripción de la oferta:</b><br>   '+ofertas[i]['texto_oferta']+'</div></h4><h4><div  class="panel-body "><b>Categoría:</b><br>'+ofertas[i]['categoria']+'</div></h4><h4><div  class="panel-body" ><b>Provincia:</b><br>'+ofertas[i]['provincia']+'</div></h4><h4><div class="panel-body candidatos" class="panel-body "><b>Candidatos:</b><br></div></h4></div></div>');
               
                    
                    var arrayCandidatos=ofertas[i]['candidatosNombres'].split(';');
                    if(ofertas[i]['candidatos']!=null){
                    var arrayNumeros=ofertas[i]['candidatos'].split(';');
                    }
                    for(j=0;j<arrayCandidatos.length;j++){
                        $('#oferta-'+ofertas[i]['id_oferta']+' .candidatos').append(''+arrayCandidatos[j]+' → <a href="<?php echo $this->config->item('app_url'); ?>index.php/ofertas/verPerfil/'+arrayNumeros[j]+'">Ver perfil</a></br>');
                    }
                }
            }
            else{
                $('#ofertas').append('<div class="alert alert-danger" role="alert">No estás apuntado a ninguna oferta</div>');
            }
            
        });
    }
    
    
</script>
</body>
</html>