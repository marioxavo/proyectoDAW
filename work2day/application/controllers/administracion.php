<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administracion extends CI_Controller {

	
	public function index()
	{
		redirect('administracion/usuarios');
	}
    public function usuarios(){
         $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$datosUsuario->nombre;
        if($datosUsuario->id_grupo_usuarios==3){
        $usuarios=$this->usuarios_model->sacarUsuarios();
        
        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'usuarios' => $usuarios,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
        
        $this->load->view('inicio/head.php');
        $this->load->view('administracion/usuariosAdmin.php',$data);
        }
        else{
            redirect('inicio/login');
        }
    }
    public function ofertas(){
         $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$datosUsuario->nombre;
        if($datosUsuario->id_grupo_usuarios==3){
        
        $ofertas=$this->ofertas_model->ofertasCompleto();
        
        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'ofertas' => $ofertas,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
        
        $this->load->view('inicio/head.php');
        $this->load->view('administracion/ofertasAdmin.php',$data);
        }
        else{
            redirect('inicio/login');
        }
    }
    public function borrarUsuario($id){
         $usuarios=$this->usuarios_model->borrarUsuario($id);
        echo $usuarios;
    }
    public function borrarOferta($id){
        $ofertas=$this->ofertas_model->borrarOferta($id);
        echo json_encode($ofertas);
    }
   
}
