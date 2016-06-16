<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Busquedas extends CI_Controller {

	public function buscarCiudad($ciudad=""){
         $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$datosUsuario->nombre;

        $ofertas=$this->ofertas_model->buscarCiudad($ciudad);
        
        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'ofertas' => $ofertas,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
        
        $this->load->view('inicio/head.php');
        $this->load->view('ofertas/generalOfertas.php',$data);
    }
    public function buscarGeneral($texto=""){
         $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$datosUsuario->nombre;
        
        $ofertas=$this->ofertas_model->buscarGeneral($texto);
        
        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'ofertas' => $ofertas,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
        
        $this->load->view('inicio/head.php');
        $this->load->view('ofertas/generalOfertas.php',$data);
    }
	public function buscarCategoria($categoria=""){
            $daniel=$this->login_work->isLogged();
            $datosUsuario=$this->login_model->verUsuario($daniel);
            $nombre=$datosUsuario->nombre;
        

        $ofertas=$this->ofertas_model->buscarCategoria($categoria);
        
        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'ofertas' => $ofertas,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
        
        $this->load->view('inicio/head.php');
        $this->load->view('ofertas/generalOfertas.php',$data);
        
        
    }
    public function buscarPerfiles($texto){
         $daniel=$this->login_work->isLogged();
            $datosUsuario=$this->login_model->verUsuario($daniel);
            $nombre=$datosUsuario->nombre;
        

        $perfiles=$this->ofertas_model->buscarPerfiles($texto);
        
        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'perfiles' => $perfiles,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
        
        $this->load->view('inicio/head.php');
        $this->load->view('usuarios/generalPerfiles.php',$data);
    }
    
    
}
