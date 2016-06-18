<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busquedas extends CI_Controller {

	
    public function buscarGeneral(){
         $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$datosUsuario->nombre;
        $provincias=$this->ofertas_model->sacarProvincias();
        
        $texto="";
        $ciudad=0;
        if(isset($_GET['texto'])){
            $texto=$_GET['texto'];
        }
        if(isset($_GET['ciudad'])){
            $ciudad=$_GET['ciudad'];
        }
        
        $ofertas=$this->ofertas_model->buscarGeneral($texto,$ciudad);
        
        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'ofertas' => $ofertas,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios,'mensaje' => 'Resultados','provincias' => $provincias);
        
        $this->load->view('inicio/head.php');
        $this->load->view('ofertas/generalOfertas.php',$data);
    }
	public function buscarCategoria($categoria=""){
            $daniel=$this->login_work->isLogged();
            $datosUsuario=$this->login_model->verUsuario($daniel);
            $nombre=$datosUsuario->nombre;
        
        $provincias=$this->ofertas_model->sacarProvincias();
        
        $ofertas=$this->ofertas_model->buscarCategoria($categoria);
        
        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'ofertas' => $ofertas,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios,'mensaje' => 'Resultados',"provincias" => $provincias);
        
        $this->load->view('inicio/head.php');
        $this->load->view('ofertas/generalOfertas.php',$data);
        
        
    }
    public function buscarPerfiles(){
         $daniel=$this->login_work->isLogged();
            $datosUsuario=$this->login_model->verUsuario($daniel);
            $nombre=$datosUsuario->nombre;
        $texto="";
        $ciudad="";
        
         if(isset($_GET['texto'])){
            $texto=$_GET['texto'];
        }
        if(isset($_GET['ciudad'])){
            $ciudad=$_GET['ciudad'];
        }
        
        $perfiles=$this->ofertas_model->buscarPerfiles($texto,$ciudad);
        
        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'perfiles' => $perfiles,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
        
        $this->load->view('inicio/head.php');
        $this->load->view('usuarios/generalPerfiles.php',$data);
    }
    
    
}
