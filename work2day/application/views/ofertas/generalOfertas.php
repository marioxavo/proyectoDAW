<body class="colorFondo">
<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
           <?php include("cabecera.php"); ?>
        </nav>
        <div class="row" style="margin-bottom: 80px;">
                    <h3 style="color:white;" class="col-md-offset-3 col-md-6">Realizar otra busqueda</h3>
                    <div class="col-md-6 col-md-offset-3">
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control" aria-label="..." id="inputBusc"><select id="sCiudad" class="form-control" style="overflow-y: scroll; max-height:250px;">
                            <option value=0>Todas</option>
                            <?php foreach($provincias as $provincia){ ?>
                                        <option value="<?= $provincia['id'];?>"><?= $provincia['provincia']; ?></option>
                                    <?php } ?>
                            </select>
                        
                        
                            
                            <input type="button" class="btn btn-primary" id="buscarTexto" onclick="buscar()" value="Buscar" style="width: 100%;" >
                        </div>
                    </div><!-- /.col-lg-6 -->
                </div>
        <div class="row">
         <h3 style="color:white;" class="col-md-9"><?= $mensaje;?></h3>
        </div>
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
        $('#menu2').addClass('active');
    });


    function mostrarOfertas(ofertas){
        
        $('#ofertas').fadeOut(400,function(){
           $('#ofertas').html('');
           $('#ofertas').fadeIn(400);
            
            if(ofertas[0].length!=0){
                for(i=0;i<ofertas.length;i++){
                    $('#ofertas').append('<div id="oferta-'+ofertas[i]['id_oferta']+'"></div>');
																	
                 $('#oferta-'+ofertas[i]['id_oferta']).append('<div class="col-md-6"><div class="panel panel-primary "><div class="panel-heading" class="titulo_oferta" style="font-size: 2em;">'+ofertas[i]['titulo_oferta']+'</div><h4><div  id="nombre" class="panel-body"><b>Empresa:</b><br>  '+ofertas[i]['nombre_empresa']+' → <a href="<?php echo $this->config->item('app_url'); ?>index.php/mensajeria/redactarMensaje?nr='+ofertas[i]['nombre_empresa']+'">Contactar</a> <br><a href="<?php echo $this->config->item('app_url'); ?>index.php/ofertas/verPerfilE/'+ofertas[i]['id_empresa']+'">Ver perfil de la empresa</a></div></h4><h4><label class="panel-body">Descripión de la oferta:</label><div  class="panel-body ">'+ofertas[i]['texto_oferta']+'</div></h4><h4><div  class="panel-body "><b>Categoría:</b><br>'+ofertas[i]['categoria']+'</div></h4><h4><div  class="panel-body" ><b>Provincia:</b><br>'+ofertas[i]['provincia']+'</div></h4><h4><div class="panel-body candidatos" class="panel-body "><b>Candidatos:</b><br></div></h4></div></div>');
                    $('#oferta-'+ofertas[i]['id_oferta']).append('<div class="botones col-md-7" style="margin-bottom: 40px;"><input class="btn btn-primary col-md-2 col-xs-4" type="button" value="Me apunto" onclick="apuntarOferta('+ofertas[i]['id_oferta']+')"></div>');
                    var arrayCandidatos=ofertas[i]['candidatosNombres'].split(';');
                   if(ofertas[i]['candidatos']!=null){
                    var arrayNumeros=ofertas[i]['candidatos'].split(';');
                    }
                    for(j=0;j<arrayCandidatos.length;j++){
                        if(arrayCandidatos[j]!=""){
                        $('#oferta-'+ofertas[i]['id_oferta']+' .candidatos').append(''+arrayCandidatos[j]+' → <a href="<?php echo $this->config->item('app_url'); ?>index.php/ofertas/verPerfil/'+arrayNumeros[j]+'">Ver perfil</a></br>');
                        }
                    }
                }
            }
            else{
                $('#ofertas').append('<div class="alert alert-danger" role="alert">No hay ofertas disponibles</div>');
            }
            
        });
    }
    function apuntarOferta(id){
        var id_usuario=<?= $id_usuario;?>;
         $.post('<?php echo $this->config->item('app_url').'index.php/ofertas/apuntarseOferta/';?>'+id,{id_usuario: id_usuario},function(data){
                
                mostrarOfertas(data);
            },'json');
    }
    function buscar(){
            var texto="";
            texto=document.getElementById('inputBusc').value;
            var ciudad=document.getElementById('sCiudad').value;
            window.location='<?php echo $this->config->item('app_url').'index.php/busquedas/buscarGeneral?texto=';?>'+texto+'&ciudad='+ciudad;
        }
    
    
</script>
</body>
</html>