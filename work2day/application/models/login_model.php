<?php

class Login_model extends CI_Model {


    public function __construct() {

        parent::__construct();		
    }
    
public function comprobarUsuario($nombre,$password){
    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->where('nombre',$nombre);
    $this->db->where('password',$password);
    $query=$this->db->get();
    
    $data=array();
    foreach($query->result() as $row){
        $data['nombre']=$row->nombre;
        $data['password']=$row->password;
    }
    if(count($data)==0){
        return false;
    }
    else{
        return $data;
    }
}
    public function verUsuario($nombre=""){
		$this->db->select('*');
		$this->db->from('usuarios');
		$this->db->where('nombre', $nombre);
		$consulta = $this->db->get();
		$resultado = $consulta->row();
      
	
		return $resultado; //Objeto Usuario
	}
    public function insertarUsuario($nombre,$email,$password,$id_grupo){
        $data=array(
            'nombre' => $nombre,
            'email' => $email,
            'password' => $password,
            'id_grupo_usuarios' => $id_grupo
        );
        $this->db->insert('usuarios',$data);
    }

}