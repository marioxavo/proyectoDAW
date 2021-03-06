<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class login_work  {

    protected $ci;

    function __construct(){
        $this->ci =& get_instance();
		
        
    }
	

	public function isLogged() {
		if($this->ci->session->userdata('loggin') == true){
			$data = array();
			$data['nombre'] = $this->ci->session->userdata('nombre');
			return $data['nombre'];
		}else{
				redirect('inicio/login');
			
		}
	}
	
   public function logOut($returnUrl = 'inicio/login' ) {
      $this->ci->session->unset_userdata('data_three');
       $this->ci->session->unset_userdata('data_one');
      $this->ci->session->sess_destroy();

      redirect($returnUrl);
   }
   
   
   
	public function processLogin($nombre, $password) {
		
		if($this->ci->login_model->comprobarUsuario($nombre, $password)){
			//Logueado!! Guardamos la sesión y lo enviamos a la pagina de inicio
			$usuario_data = array(
			   'nombre' => $nombre,
			   'loggin' => true
			);
			$this->ci->session->set_userdata($usuario_data);
			return true;
		}else{
			return false;
		}
		
	}
}
