<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function editarPerfilT(){
        $comprobarLogin=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($comprobarLogin);
        $nombre=$this->mensajeria_model->getNombre($datosUsuario->id);
        
        if($datosUsuario->id_grupo_usuarios==1){
            $perfilUsuario=$this->usuarios_model->sacarPerfil($datosUsuario->id);
             $data=array('perfilUsuario'=> $perfilUsuario,'nombre'=> $nombre);
        $this->load->view('usuarios/editarPerfilT',$data);
        }
        elseif($datosUsuario->id_grupo_usuarios==2){
            $perfilUsuario=$this->usuarios_model->sacarPerfilEmpresa($datosUsuario->id);
             $data=array('perfilUsuario'=> $perfilUsuario,'nombre'=> $nombre);
            $this->load->view('usuarios/editarPerfilE',$data);
        }
    }
    
	public function actualizarPerfilT(){
        $perfilUsuario=$this->usuarios_model->actualizarPerfil($_POST['id_usuario'],$_POST['nombre'],$_POST['habilidades'],$_POST['estudios'],$_POST['experiencia']);
        echo $perfilUsuario;
    }
    public function actualizarPerfilE(){
        $perfilUsuario=$this->usuarios_model->actualizarPerfilEmpresa($_POST['id_usuario'],$_POST['titulo'],$_POST['descripcion']);
        echo $perfilUsuario;
    }
    public function refrescarPerfilT(){
        $perfilUsuario=$this->usuarios_model->sacarPerfil($_POST['id_usuario']);
        $p=json_encode($perfilUsuario);
        echo $p;
    }
    public function refrescarPerfilE(){
        $perfilUsuario=$this->usuarios_model->sacarPerfilEmpresa($_POST['id_usuario']);
        $p=json_encode($perfilUsuario);
        echo $p;
    }
}
