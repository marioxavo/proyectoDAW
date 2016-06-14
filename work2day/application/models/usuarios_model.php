<?php

class Usuarios_model extends CI_Model {


    public function __construct() {

        parent::__construct();		
    }
    public function sacarPerfil($id){
        $this->db->select('*');
        $this->db->from('perfiles');
        $this->db->where('id_usuario',$id);
        
        $query=$this->db->get();
        
        $data=array();
        
        
        foreach($query->result() as $row){
            $data['id_perfil']=$row->id_perfil;    
            $data['id_usuario']=$row->id_usuario;    
            $data['nombre']=$row->nombre;    
            $data['habilidades']=$row->habilidades;    
            $data['estudios']=$row->estudios;    
            $data['experiencia']=$row->experiencia;
            
        }
        
        return $data;
    }
    public function sacarPerfilEmpresa($id){
        $this->db->select('*');
        $this->db->from('perfiles_empresa');
        $this->db->where('id_usuario',$id);
        
        $query=$this->db->get();
        
        $data=array();
        
        
        foreach($query->result() as $row){
            $data['id_perfil']=$row->id_perfil;    
            $data['id_usuario']=$row->id_usuario;    
            $data['titulo_completo']=$row->titulo_completo;    
            $data['descripcion']=$row->descripcion;    
            
        }
        
        return $data;
    }
    public function actualizarPerfil($id,$nombre,$habilidades,$estudios,$experiencia){
        $data=array(
        'nombre' => $nombre,
        'habilidades' => $habilidades,
        'estudios' => $estudios,
        'experiencia' => $experiencia
        );
        $this->db->where('id_usuario',$id);
        $this->db->update('perfiles',$data);
        
        return json_encode($this->sacarPerfil($id));
    }
     public function actualizarPerfilEmpresa($id,$titulo,$descripcion){
        $data=array(
        'titulo_completo' => $titulo,
        'descripcion' => $descripcion
        );
        $this->db->where('id_usuario',$id);
        $this->db->update('perfiles_empresa',$data);
        
        return json_encode($this->sacarPerfilEmpresa($id));
    }
	
				 public function sacarCuenta($id){
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('id',$id);
        
        $query=$this->db->get();
        
        $data=array();
        
        
        foreach($query->result() as $row){
            $data['id_cuenta']=$row->id;       
            $data['nombre']=$row->nombre;    
            $data['email']=$row->email;    
            $data['password']=$row->password;    
            
            
        }
        
        return $data;
    }
	 public function actualizarCuenta($id,$email,$password){
        $data=array(
        'email' => $email,
        'password' => $password
        );
        $this->db->where('id',$id);
        $this->db->update('usuarios',$data);
        
        return $this->sacarCuenta($id);
    }

}