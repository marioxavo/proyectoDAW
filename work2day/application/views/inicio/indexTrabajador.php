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
                <div class="row" style="margin-bottom: 30px;">
                    <h2 style="color:white;" class="col-md-offset-3 col-md-6">Empieza buscando ofertas en tu ciudad</h2>
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
                
                    <div class="col-sm-6 col-md-4">
                        <a href="<?php echo $this->config->item('app_url').'index.php/busquedas/buscarCategoria/Informatica';?>">
                        <div class="thumbnail">
                            <img class="imagenCategoria" src="<?php echo $this->config->item('app_url').'template/img/informatica.jpg';?>" alt="...">
                            <div class="caption">
                                <h3 class="centrado">Informática</h3>
                                <p>...</p>
                                 
                            </div>
                            </div></a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="<?php echo $this->config->item('app_url').'index.php/busquedas/buscarCategoria/Limpieza';?>">
                        <div class="thumbnail">
                            <img class="imagenCategoria" src="<?php echo $this->config->item('app_url').'template/img/limpieza.jpg';?>" alt="...">
                            <div class="caption">
                                <h3 class="centrado">Limpieza</h3>
                                <p>...</p>
                                 
                            </div>
                            </div></a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="<?php echo $this->config->item('app_url').'index.php/busquedas/buscarCategoria/Mecanica';?>">
                        <div class="thumbnail">
                            <img class="imagenCategoria" src="<?php echo $this->config->item('app_url').'template/img/mecanica.jpg';?>" alt="...">
                            <div class="caption">
                                <h3 class="centrado">Mecánica</h3>
                                <p>...</p>
                                 
                            </div>
                            </div></a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="<?php echo $this->config->item('app_url').'index.php/busquedas/buscarCategoria/Ingenieria';?>">
                        <div class="thumbnail">
                            <img class="imagenCategoria" src="<?php echo $this->config->item('app_url').'template/img/ingenieria.jpg';?>" alt="...">
                            <div class="caption">
                                <h3 class="centrado">Ingeniería</h3>
                                <p>...</p>
                                 
                            </div>
                            </div></a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="<?php echo $this->config->item('app_url').'index.php/busquedas/buscarCategoria/Educacion';?>">
                        <div class="thumbnail">
                            <img class="imagenCategoria" src="<?php echo $this->config->item('app_url').'template/img/educacion.jpg';?>"  alt="...">
                            <div class="caption">
                                <h3 class="centrado">Educación</h3>
                                <p>...</p>
                                 
                            </div>
                            </div></a>
                    </div>
              
                    <div class="col-sm-6 col-md-4">
                        <a href="<?php echo $this->config->item('app_url').'index.php/busquedas/buscarCategoria/Hosteleria';?>">
                        <div class="thumbnail">
                            <img class="imagenCategoria" src="<?php echo $this->config->item('app_url').'template/img/hosteleria.jpg';?>" alt="...">
                            <div class="caption">
                                <h3 class="centrado">Hostelería</h3>
                                <p>...</p>
                                 
                            </div>
                            </div></a>
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
        <script src="?php echo $this->config->item('app_url').'template/bootstrap/js/ie10-viewport-bug-workaround.js';?>"></script>
        <script>
        function buscar(){
            var texto="";
            texto=document.getElementById('inputBusc').value;
            var ciudad=document.getElementById('sCiudad').value;
            window.location='<?php echo $this->config->item('app_url').'index.php/busquedas/buscarGeneral?texto=';?>'+texto+'&ciudad='+ciudad;
        }
        </script>
    </body>
</html>
