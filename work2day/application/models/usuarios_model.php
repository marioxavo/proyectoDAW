<?php

class Usuarios_model extends CI_Model {


    public function __construct() {

        parent::__construct();		
    }
    public function sacarUsuarios(){
         $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('id_grupo_usuarios <>',3);
        $query=$this->db->get();
        
        $data=array(array());
        $i=0;
        
        foreach($query->result() as $row){
            $data[$i]['id']=$row->id;
            $data[$i]['nombre']=$row->nombre;
            $data[$i]['email']=$row->email;
            $data[$i]['id_grupo_usuarios']=$row->id_grupo_usuarios;
            if($row->id_grupo_usuarios==1){
                 $data[$i]['grupo_usuarios']="Trabajador";
            }
            else{
               $data[$i]['grupo_usuarios']="Empresa"; 
            }
            $i++;
        }
        
        return json_encode($data);
    }
    public function borrarUsuario($id){
        $dataPerfil=array(
        'id_usuario' => $id
        );
        $this->db->delete('perfiles',$dataPerfil);
        $this->db->delete('perfiles_empresa',$dataPerfil);
        
        $data=array(
            'id' => $id
        );
        $this->db->delete('usuarios',$data);
        return $this->sacarUsuarios();
        
        
        
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
            $data['imagen']=$row->imagen;
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
             $data['imagen']=$row->imagen;
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
    public function subirImagen($id,$imagen){
        $data=array(
        'imagen'=>$imagen
        );
        $this->db->where('id_perfil',$id);
        $this->db->update('perfiles',$data);
    }
    public function subirImagenE($id,$imagen){
        $data=array(
        'imagen'=>$imagen
        );
        $this->db->where('id_perfil',$id);
        $this->db->update('perfiles_empresa',$data);
    }
    public function getNombrePerfil($id){
        $nombre="";
        $this->db->select('nombre');
        $this->db->from('perfiles');
        $this->db->where('id_usuario',$id);
        $query=$this->db->get();
        
        foreach($query->result() as $row){
            $nombre=$row->nombre;
        }
        return $nombre;
        
    }
}