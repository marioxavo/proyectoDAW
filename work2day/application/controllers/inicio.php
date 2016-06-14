<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	
	public function index()
	{
		redirect('inicio/login');
	}
    public function login(){
        //$this->load->view('template/header.php');
        $data=array('mensaje' => "");
        $this->load->view('inicio/index.php',$data);
    }
    public function comprobar(){
        $comprobado=$this->login_work->processLogin($_POST['nombre'], $_POST['password']);
        
        if(!$comprobado){
            
             $data=array('mensaje' => "Login Incorrecto");
             $this->load->view('inicio/index.php',$data);

        }
        else{
            $comprobarLogin=$this->login_work->isLogged();
            $datosUsuario=$this->login_model->verUsuario($comprobarLogin);
            $booleano=false;
            if($datosUsuario->id_grupo_usuarios==1){
                $booleano=$this->login_model->comprobarPerfil($datosUsuario->id);
            }
            elseif($datosUsuario->id_grupo_usuarios==2){
                $booleano=$this->login_model->comprobarPerfilEmp($datosUsuario->id);
            }
            else{
                redirect('administracion/ofertas');
            }
        
        if(!$booleano){
            redirect('inicio/creacionPerfil');
        }
        else{
            
            redirect('inicio/portada');
        }
        }

    }
    public function portada(){
        $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$this->mensajeria_model->getNombre($datosUsuario->id);
        $provincias=$this->ofertas_model->sacarProvincias();
        $data=array('nombre'=>$nombre,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios,'provincias' => $provincias);
        if($datosUsuario->id_grupo_usuarios==1){
        $this->load->view('inicio/indexTrabajador.php', $data);
        }
        else{
           $this->load->view('inicio/indexEmpresa.php', $data);
        }
    }
    public function registro($id_grupo){
        if($id_grupo==1){
            $dato='Trabajador';
        }
        else{
            $dato='Empresa';
        }
        $data=array('id_grupo' => $id_grupo,'mensaje' => "", 'dato' => $dato);
        $this->load->view('inicio/registro.php',$data);
    }
    public function registrar($id_grupo){
        $this->form_validation->set_rules('nombre', 'nombre', 'trim|required|min_length[1]|max_length[150]');
		$this->form_validation->set_rules('email', 'email', 'trim|required|min_length[1]|max_length[150]');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[1]|max_length[70]');
        
		if( $this->form_validation->run() ){
            $nombre = $this->input->post('nombre');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
            $mensaje=$this->login_model->insertarUsuario($nombre,$email,$password,$id_grupo);
            if($mensaje=="Usuario registrado"){
             $data=array('mensaje' => $mensaje);
            $this->load->view('inicio/index.php',$data);
            }
            else{
                if($id_grupo==1){
                $dato='Trabajador';
                }
                else{
                $dato='Empresa';
                }
            $data=array('id_grupo' => $id_grupo ,'mensaje' => $mensaje, 'dato' => $dato);
            $this->load->view('inicio/registro.php',$data);
            }
        }
        else{
            if($id_grupo==1){
                $dato='Trabajador';
            }
            else{
                $dato='Empresa';
            }
            $data=array('id_grupo' => $id_grupo ,'mensaje' => "Hay campos incorrectos", 'dato' => $dato);
            $this->load->view('inicio/registro.php',$data);
        }
    }
    public function logOut(){
        $this->login_work->logOut();
    }
    public function creacionPerfil(){
        $comprobarLogin=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($comprobarLogin);
        
        if($datosUsuario->id_grupo_usuarios == 1){
            $data=array('datosUsuario' => $datosUsuario,'mensaje' => "");
            $this->load->view('inicio/creacionPerfilT.php',$data);
        }
        else if($datosUsuario->id_grupo_usuarios == 2){
            $data=array('datosUsuario' => $datosUsuario,'mensaje' => "");
            $this->load->view('inicio/creacionPerfilE.php',$data);
        }
    }
    public function crearPerfil(){
        $comprobarLogin=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($comprobarLogin);
        
        $this->form_validation->set_rules('nombre', 'nombre', 'trim|required|min_length[1]|max_length[150]');
		$this->form_validation->set_rules('estudios', 'estudios', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('experiencia', 'experiencia', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('habilidades', 'habilidades', 'trim|required|min_length[1]');
        
        if( $this->form_validation->run() ){
            $nombre = $this->input->post('nombre');
			$estudios = $this->input->post('estudios');
			$experiencia = $this->input->post('experiencia');
			$habilidades = $this->input->post('habilidades');
            $this->login_model->insertarPerfil($nombre,$estudios,$experiencia,$habilidades,$datosUsuario->id);
            
            $nombre=$datosUsuario->nombre;
                redirect('inicio/portada');
           
            
        }
        else{
            $data=array('datosUsuario' => $datosUsuario,'mensaje' => "Hay campos incorectos");
            $this->load->view('inicio/creacionPerfilT.php',$data);
        }
    }
    public function crearPerfilEmpresa(){
         $comprobarLogin=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($comprobarLogin);
        
        $this->form_validation->set_rules('titulo', 'titulo', 'trim|required|min_length[1]|max_length[150]');
		$this->form_validation->set_rules('descripcion', 'descripcion', 'trim|required|min_length[1]');
		
        
        if( $this->form_validation->run() ){
            $titulo = $this->input->post('titulo');
			$descripcion = $this->input->post('descripcion');
			
            $this->login_model->insertarPerfilEmpresa($titulo,$descripcion,$datosUsuario->id);
            
            $nombre=$datosUsuario->nombre;
            
                redirect('inicio/portada');
            
            
        }
        else{
            $data=array('datosUsuario' => $datosUsuario,'mensaje' => "Hay campos incorectos");
            $this->load->view('inicio/creacionPerfilE.php',$data);
        }
    }
}
