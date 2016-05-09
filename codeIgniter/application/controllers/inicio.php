<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
        if($this->login_model->comprobarUsuario($_POST['nombre'], $_POST['password'])){
			//Logueado!! Guardamos la sesión y lo enviamos a la pagina de inicio
			$usuario_data = array(
			   'nombre' => $_POST['nombre'],
			   'loggin' => true
			);
			$this->session->set_userdata($usuario_data);
			$comprobado=true;
		}else{
			$comprobado=false;
		}
        
        if(!$comprobado){
            
             $data=array('mensaje' => "Login Incorrecto");
             $this->load->view('inicio/index.php',$data);

        }
        else{
        $datosUsuario=$this->login_model->verUsuario($this->session->userdata('nombre'));
        $nombre=$datosUsuario->nombre;
        $data=array('nombre' => $nombre);
        $this->load->view('inicio/inicio.php',$data);
           // redirect('inicio/portada');
        }

    }
    public function portada(){
       var_dump($this->session->all_userdata());
        //$daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($this->session->userdata('nombre'));
        $nombre=$datosUsuario->nombre;
        $data=array('nombre' => $nombre);
        $this->load->view('inicio/inicio.php',$data);
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
            $this->login_model->insertarUsuario($nombre,$email,$password,$id_grupo);
             $data=array('mensaje' => "Usuario registrado");
            $this->load->view('inicio/index.php',$data);
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
}
