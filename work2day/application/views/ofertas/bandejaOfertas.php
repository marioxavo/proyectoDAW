
<!-- NAVBAR
================================================== -->

<body class="colorFondo">
<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
           <?php include("cabecera.php"); ?>
        </nav>
        <div class="row">
            <input type="button" class="btn btn-primary" style="margin-bottom: 20px;" value="Crear oferta" onclick="crearOferta()"/><br>
            <div id="ofertas">
            </div>
            <div id="mensaje"></div>

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
                    $('#oferta-'+ofertas[i]['id_oferta']).append('<div class="col-md-7 col-xs-7"><div class="panel panel-primary "><div class="panel-heading titulo_oferta" >'+ofertas[i]['titulo_oferta']+'</div><h4><div id="nombre" class="panel-body"><b>Empresa:</b><br>'+ofertas[i]['nombre_empresa']+'</div></h4><h4><label class="panel-body">Descripión de la oferta:</label><div class=" panel-body texto_oferta">'+ofertas[i]['texto_oferta']+'</div></h4><h4><div class="panel-body categoria" ><b>Categoría:</b><br>'+ofertas[i]['categoria']+'</div></h4><h4><div class=" panel-body municipio"><b>Provincia:</b><br>'+ofertas[i]['provincia']+'</div></h4><h4><div class="panel-body candidatos"><b>Candidatos</b><br></div></h4></div></div>');
                    $('#oferta-'+ofertas[i]['id_oferta']).append('<div class="botones col-md-7" col-xs-7 style="margin-bottom: 20px;"><input class="btn btn-primary col-md-2 col-xs-2" type="button" value="Editar" onclick="editarOferta('+ofertas[i]['id_oferta']+')"></div>');
                    var arrayCandidatos=ofertas[i]['candidatosNombres'].split(';');
                    var arrayCandidatosPerfil=ofertas[i]['candidatosNombresPerfil'].split(';');
                   if(ofertas[i]['candidatos']!=null){
                    var arrayNumeros=ofertas[i]['candidatos'].split(';');
                    }
                    for(j=0;j<arrayCandidatos.length;j++){
                        if(arrayCandidatos[j]!=""){
                        $('#oferta-'+ofertas[i]['id_oferta']+' .candidatos').append('<a href="<?php echo $this->config->item('app_url'); ?>index.php/mensajeria/redactarMensaje?nr='+arrayCandidatos[j]+'">'+arrayCandidatosPerfil[j]+'</a> → <a href="<?php echo $this->config->item('app_url'); ?>index.php/ofertas/verPerfil/'+arrayNumeros[j]+'">Ver perfil</a></br>');
                        }
                    }
                }
            }
            else{
                $('#ofertas').append('<div class="alert alert-danger" role="alert">No has creado ninguna oferta</div>')
            }
            
            
        });
    }
    function crearOferta(){
        var categorias=<?= $categorias; ?>;
        var provincias=<?= $provincias; ?>;
        
        $('#ofertas').fadeOut(400,function(){
					$('#ofertas').html('');
					$('#ofertas').fadeIn(400);
					$('#ofertas').append('<div class="col-md-7"><h4><label class="label label-primary" for="titulo_oferta">Puesto</label></h4><input type="text" class="form-control" id="titulo_oferta" aria-describedby="basic-addon3"></div>');
					$('#ofertas').append('<div class="col-md-7"><h4><label class="label label-primary" for="texto_oferta">Especificaciones</label></h4><input type="text" class="form-control" id="texto_oferta" aria-describedby="basic-addon3"></div>');
					$('#ofertas').append('<div class="col-md-7"><h4><label class="label label-primary" for="categoria">Categoria</label></h4><select class="form-control" id="categoria"></select>');
                    for(i=0;i<categorias.length;i++){
                        $('#categoria').append('<option>'+categorias[i]['nombre']+'</option>');
                    }
					$('#ofertas').append('<div class="col-md-7"><h4><label class="label label-primary" for="provincia">Provincia</label></h4><select type="text" class="form-control" id="provincia"></select>');
					for(i=0;i<provincias.length;i++){
                        $('#provincia').append('<option value="'+provincias[i]['id']+'">'+provincias[i]['provincia']+'</option>');
                    }
					$('#ofertas').append('<div class="botones col-md-7" col-xs-7 ><input class="btn btn-primary col-md-2 col-xs-2" type="button" value="Crear" onclick="crear()"><input class="btn btn-primary col-md-offset-1 col-md-2 col-xs-offset-1 col-xs-2" type="button" value="Volver" onclick="volver()"></div>');
				});
    }
    function editarOferta(id){
          var categorias=<?= $categorias; ?>;
        var provincias=<?= $provincias; ?>;
        var titulo=$('#oferta-'+id+' .titulo_oferta').html();
        var texto=$('#oferta-'+id+' .texto_oferta').html();
        var categoria=$('#oferta-'+id+' .categoria').html();
        $('#ofertas').fadeOut(400,function(){
					$('#ofertas').html('');
					$('#ofertas').fadeIn(400);
					$('#ofertas').append('<div class="col-md-7"><h4><label class="label label-primary" for="texto_oferta">Puesto</label></h4><input type="text" class="form-control" id="titulo_oferta" aria-describedby="basic-addon3" value="'+titulo+'"></div>');
					$('#ofertas').append('<div class="col-md-7"><h4><label class="label label-primary" for="texto_oferta">Descripción</label></h4><input type="text" class="form-control" id="texto_oferta" aria-describedby="basic-addon3" value="'+texto+'"></div>');
					
					$('#ofertas').append('<div class="col-md-7"><h4><label class="label label-primary" for="categoria">Categoria</label></h4><select class="form-control" id="categoria"></select>');
                    for(i=0;i<categorias.length;i++){
                        $('#categoria').append('<option>'+categorias[i]['nombre']+'</option>');
                    }
					$('#ofertas').append('<div class="col-md-7"><h4><label class="label label-primary" for="provincia">Provincia</label></h4><select type="text" class="form-control" id="provincia"></select>');
					for(i=0;i<provincias.length;i++){
                        $('#provincia').append('<option value="'+provincias[i]['id']+'">'+provincias[i]['provincia']+'</option>');
                    }
					$('#ofertas').append('<div class="botones col-md-7" col-xs-7 ><input class="btn btn-primary col-md-2 col-xs-2" type="button" value="Editar" onclick="editar('+id+')"><input class="btn btn-primary col-md-offset-1 col-md-2 col-xs-offset-1 col-xs-2" type="button" value="Volver" onclick="volver()"></div><br>');
				});
    }
    function crear(){
        var id_usuario=<?= $id_usuario;?>;
         var titulo=document.getElementById('titulo_oferta').value;
        var texto=document.getElementById('texto_oferta').value;
        var provincia=document.getElementById('provincia').value;
        var categoria=document.getElementById('categoria').value;
        
        if(titulo=="" || texto=="" || categoria==""){
            $('#mensaje').fadeIn(400);
            $('#mensaje').html("Debes rellenar todos los campos");
        }
        else{
            $.post('<?php echo $this->config->item('app_url').'index.php/ofertas/crearOferta';?>',{id_empresa: id_usuario,titulo:titulo,texto: texto,categoria: categoria,provincia:provincia},function(data){
                $('#mensaje').fadeOut(400);
                mostrarOfertas(data);
            },'json');
        }
    }
    function volver(){
         var id_usuario=<?= $id_usuario;?>;
           $.post('<?php echo $this->config->item('app_url').'index.php/ofertas/refrescarOfertas/';?>'+id_usuario,function(data){
                $('#mensaje').fadeOut(400);
                mostrarOfertas(data);
           },'json');
    }
    function editar(id){
        var id_usuario=<?= $id_usuario;?>;
        var titulo=document.getElementById('titulo_oferta').value;
        var texto=document.getElementById('texto_oferta').value;
        var provincia=document.getElementById('provincia').value;
        var categoria=document.getElementById('categoria').value;
        
        if(titulo=="" || texto=="" || categoria==""){
            $('#mensaje').fadeIn(400);
            $('#mensaje').html("Debes rellenar todos los campos");
        }
        else{
            $.post('<?php echo $this->config->item('app_url').'index.php/ofertas/actualizarOferta/';?>'+id,{id_empresa: id_usuario,titulo:titulo,texto: texto,categoria: categoria,provincia:provincia},function(data){
                $('#mensaje').fadeOut(400);
                mostrarOfertas(data);
            },'json');
        }
    }
    
</script>
</body>
</html>