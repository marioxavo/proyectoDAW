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
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('nombre',$nombre);
        $query=$this->db->get();
        if($query->num_rows()>0){
            return "Nombre en uso";
        }
        else{
        $data=array(
            'nombre' => $nombre,
            'email' => $email,
            'password' => $password,
            'id_grupo_usuarios' => $id_grupo
        );
        $this->db->insert('usuarios',$data);
        return "Usuario registrado";
        }
    }
    
    public function comprobarPerfil($id = 0){
        $booleano=false;
        if($id == 0){
            echo "Error al enviar el id de usuario";
        }
        else{
        $this->db->select('*');
        $this->db->from('perfiles');
        $this->db->where('id_usuario',$id);
        $query=$this->db->get();
        if($query->num_rows()>0){
            $booleano=true;
        }
        return $booleano;
        }
    }
    public function comprobarPerfilEmp($id = 0){
        $booleano=false;
        if($id == 0){
            echo "Error al enviar el id de usuario";
        }
        else{
        $this->db->select('*');
        $this->db->from('perfiles_empresa');
        $this->db->where('id_usuario',$id);
        $query=$this->db->get();
        if($query->num_rows()>0){
            $booleano=true;
        }
        return $booleano;
        }
    }
    public function insertarPerfil($nombre,$estudios,$experiencia,$habilidades,$id_usuario,$ciudad){
        $data=array(
        'id_usuario' => $id_usuario,
            'nombre' => $nombre,
            'estudios' => $estudios,
            'experiencia' => $experiencia,
            'habilidades' =>$habilidades,
            'id_ciudad' => $ciudad
        );
        $this->db->insert('perfiles',$data);
        
    }
    public function insertarPerfilEmpresa($titulo,$descripcion,$id_usuario){
        $data=array(
        'id_usuario' => $id_usuario,
            'titulo_completo' => $titulo,
            'descripcion' => $descripcion 
        );
        $this->db->insert('perfiles_empresa',$data);
        
    }
}