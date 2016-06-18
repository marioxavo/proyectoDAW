<?php

class Ofertas_model extends CI_Model
{


    public function __construct()
    {

        parent::__construct();
    }

    public function sacarProvincias(){
        $this->db->select('*');
        $this->db->from('provincias');
        $query=$this->db->get();

        $data=array(array());
        $i=0;
        foreach($query->result() as $row){
            $data[$i]['id']=$row->id;
            $data[$i]['provincia']=$row->provincia;
            $i++;
        }
        return $data;
    }
    public function misOfertasT($id){
        $this->db->select('*');
        $this->db->from('ofertas');
        $this->db->where('candidatos LIKE','%'.$id.'%');
         $this->db->order_by('fecha_creacion','DESC');
        $query=$this->db->get();
        
        $data=array(array());
        $i=0;
        foreach($query->result() as $row){
            $data[$i]['id_oferta']=$row->id_oferta;
            $data[$i]['id_empresa']=$row->id_empresa;
            $data[$i]['titulo_oferta']=$row->titulo_oferta;
            $data[$i]['texto_oferta']=$row->texto_oferta;
            $data[$i]['nombre_empresa']=$this->mensajeria_model->getNombre($row->id_empresa);
            $data[$i]['categoria']=$row->categoria;
            $data[$i]['candidatos']=$row->candidatos;
            $candidatos=explode(';',$row->candidatos);
            $data[$i]['provincia']=$this->sacarProvincia($row->id_ciudad);
            $data[$i]['candidatosNombres']="";
            for($j=0;$j<count($candidatos);$j++){
                if($data[$i]['candidatosNombres']==""){
                    $data[$i]['candidatosNombres']=$this->mensajeria_model->getNombre($candidatos[$j]);
                }
                else{
                    $data[$i]['candidatosNombres'].=';'.$this->mensajeria_model->getNombre($candidatos[$j]);
                }
            }
            $i++;
        }
        return $data;
        
    }
    public function sacarOfertas($id){
        
        $this->db->select('*');
        $this->db->from('ofertas');
        $this->db->where('id_empresa',$id);
         $this->db->order_by('fecha_creacion','DESC');
        $query=$this->db->get();
        
        $data=array(array());
        $i=0;
        foreach($query->result() as $row){
            $data[$i]['id_oferta']=$row->id_oferta;
            $data[$i]['id_empresa']=$row->id_empresa;
            $data[$i]['titulo_oferta']=$row->titulo_oferta;
            $data[$i]['texto_oferta']=$row->texto_oferta;
            $data[$i]['nombre_empresa']=$this->mensajeria_model->getNombre($row->id_empresa);
            $data[$i]['categoria']=$row->categoria;
            $data[$i]['candidatos']=$row->candidatos;
            $candidatos=explode(';',$row->candidatos);
            $data[$i]['provincia']=$this->sacarProvincia($row->id_ciudad);
            $data[$i]['candidatosNombres']="";
            for($j=0;$j<count($candidatos);$j++){
                if($data[$i]['candidatosNombres']==""){
                    $data[$i]['candidatosNombres']=$this->mensajeria_model->getNombre($candidatos[$j]);
                }
                else{
                    $data[$i]['candidatosNombres'].=';'.$this->mensajeria_model->getNombre($candidatos[$j]);
                }
            }
            $i++;
        }
        return $data;
        
    }
    public function ofertasCompleto(){
        $this->db->select('*');
        $this->db->from('ofertas');
        $this->db->order_by('fecha_creacion','DESC');
        $query=$this->db->get();
        
        $data=array(array());
        $i=0;
        foreach($query->result() as $row){
            $data[$i]['id_oferta']=$row->id_oferta;
            $data[$i]['id_empresa']=$row->id_empresa;
            
            $data[$i]['titulo_oferta']=$row->titulo_oferta;
            $data[$i]['texto_oferta']=$row->texto_oferta;
            $data[$i]['nombre_empresa']=$this->mensajeria_model->getNombre($row->id_empresa);
            $data[$i]['categoria']=$row->categoria;
            $data[$i]['candidatos']=$row->candidatos;
             $candidatos=explode(';',$row->candidatos);
            $data[$i]['provincia']=$this->sacarProvincia($row->id_ciudad);
            $data[$i]['candidatosNombres']="";
            for($j=0;$j<count($candidatos);$j++){
                if($data[$i]['candidatosNombres']==""){
                    $data[$i]['candidatosNombres']=$this->usuarios_model->getNombrePerfil($candidatos[$j]);
                }
                else{
                    $data[$i]['candidatosNombres'].=';'.$this->usuarios_model->getNombrePerfil($candidatos[$j]);
                }
            }
            $i++;
        }
        return $data;
    }
    public function crearOferta($id,$titulo,$texto,$categoria,$provincia){
        $data=array(
            'id_empresa' => $id,
            'titulo_oferta' => $titulo,
            'texto_oferta' => $texto,
            'categoria' => $categoria,
            'id_ciudad' => $provincia
        );
        $this->db->insert('ofertas',$data);
        return $this->sacarOfertas($id);
    }
     public function actualizarOferta($id_oferta,$id,$titulo,$texto,$categoria,$provincia){
        $data=array(
            'titulo_oferta' => $titulo,
            'texto_oferta' => $texto,
            'categoria' => $categoria,
            'id_ciudad' => $provincia
        );
         $this->db->where('id_oferta',$id_oferta);
        $this->db->update('ofertas',$data);
        return $this->sacarOfertas($id);
    }
    public function apuntarse($id,$id_usuario){
        $this->db->select('candidatos');
        $this->db->from('ofertas');
        $this->db->where('id_oferta',$id);
        
        $query=$this->db->get();
        $candidatos="";
        foreach($query->result() as $row){
            $candidatos=$row->candidatos;
        }
        $booleano=false;
        $arrayCandidatos=explode(';',$candidatos);
        for($i=0;$i<count($arrayCandidatos);$i++){
            if($arrayCandidatos[$i]==$id_usuario){
                $booleano=true;
            }
        }
        if($candidatos==""){
           $candidatos=$id_usuario;
        }
        else{
            $candidatos.=';'.$id_usuario;
        }
        if(!$booleano){
        $data=array(
            'candidatos' => $candidatos
        );
         $this->db->where('id_oferta',$id);
        $this->db->update('ofertas',$data);
        }
        return $this->ofertasCompleto();
    }
    public function sacarCategorias(){
        $this->db->select('*');
        $this->db->from('categorias');
        $query=$this->db->get();
        
        $data=array(array());
        $i=0;
        
        foreach($query->result() as $row){
            $data[$i]['id']=$row->id;
            $data[$i]['nombre']=$row->nombre_cat;
            $i++;
        }
        return json_encode($data);
    }
    public function mostrarProvincias(){
        $this->db->select('*');
        $this->db->from('provincias');
        $query=$this->db->get();
        
        $data=array(array());
        $i=0;
        
        foreach($query->result() as $row){
            $data[$i]['id']=$row->id;
            $data[$i]['provincia']=$row->provincia;
            $i++;
        }
        return json_encode($data);
    }
    public function sacarProvincia($id){
        $this->db->select('*');
        $this->db->from('provincias');
        $this->db->where('id',$id);
        $query=$this->db->get();
        
        $data="";
        
        foreach($query->result() as $row){
            
            $data=$row->provincia;
            
        }
        return $data;
    }
    public function borrarOferta($id){
        $data=array(
        'id_oferta'=> $id
        );
        
        $this->db->delete('ofertas',$data);
        return $this->ofertasCompleto();
    }
    public function buscarCategoria($categoria){
        $this->db->select('*');
        $this->db->from('ofertas');
        $this->db->where('categoria',$categoria);
        $query=$this->db->get();
        
        $data=array(array());
        $i=0;
        foreach($query->result() as $row){
            $data[$i]['id_oferta']=$row->id_oferta;
            $data[$i]['id_empresa']=$row->id_empresa;
            
            $data[$i]['titulo_oferta']=$row->titulo_oferta;
            $data[$i]['texto_oferta']=$row->texto_oferta;
            $data[$i]['nombre_empresa']=$this->mensajeria_model->getNombre($row->id_empresa);
            $data[$i]['categoria']=$row->categoria;
            $data[$i]['candidatos']=$row->candidatos;
             $candidatos=explode(';',$row->candidatos);
            $data[$i]['provincia']=$this->sacarProvincia($row->id_ciudad);
            $data[$i]['candidatosNombres']="";
            for($j=0;$j<count($candidatos);$j++){
                if($data[$i]['candidatosNombres']==""){
                    $data[$i]['candidatosNombres']=$this->mensajeria_model->getNombre($candidatos[$j]);
                }
                else{
                    $data[$i]['candidatosNombres'].=';'.$this->mensajeria_model->getNombre($candidatos[$j]);
                }
            }
            $i++;
        }
        return $data;
    }
    
    public function buscarGeneral($texto="",$ciudad=0){
        $this->db->select('*');
        $this->db->from('ofertas');
        if($ciudad!=0){
        $this->db->where('id_ciudad',$ciudad);    
        }
        if($texto!=""){
        $this->db->where('titulo_oferta LIKE','%'.$texto.'%');
        $this->db->or_where('titulo_oferta LIKE','%'.$texto.'%');
        $this->db->or_where('texto_oferta LIKE','%'.$texto.'%');
        $this->db->or_where('categoria LIKE','%'.$texto.'%');
        }
         $this->db->order_by('fecha_creacion','DESC');
        $query=$this->db->get();
        
        $data=array(array());
        $i=0;
        foreach($query->result() as $row){
            $data[$i]['id_oferta']=$row->id_oferta;
            $data[$i]['id_empresa']=$row->id_empresa;
            
            $data[$i]['titulo_oferta']=$row->titulo_oferta;
            $data[$i]['texto_oferta']=$row->texto_oferta;
            $data[$i]['nombre_empresa']=$this->mensajeria_model->getNombre($row->id_empresa);
            $data[$i]['categoria']=$row->categoria;
            $data[$i]['candidatos']=$row->candidatos;
             $candidatos=explode(';',$row->candidatos);
            $data[$i]['provincia']=$this->sacarProvincia($row->id_ciudad);
            $data[$i]['candidatosNombres']="";
            for($j=0;$j<count($candidatos);$j++){
                if($data[$i]['candidatosNombres']==""){
                    $data[$i]['candidatosNombres']=$this->mensajeria_model->getNombre($candidatos[$j]);
                }
                else{
                    $data[$i]['candidatosNombres'].=';'.$this->mensajeria_model->getNombre($candidatos[$j]);
                }
            }
            $i++;
        }
        return $data;
    }
    public function buscarPerfiles($texto="",$ciudad=0){
        $this->db->select('*');
        $this->db->from('perfiles');
        if($ciudad!=0){
            $this->db->where('id_ciudad',$ciudad);
        }
        if($texto!=""){
        $this->db->where('nombre LIKE','%'.$texto.'%');
        $this->db->or_where('habilidades LIKE','%'.$texto.'%');
        $this->db->or_where('estudios LIKE','%'.$texto.'%');
        $this->db->or_where('experiencia LIKE','%'.$texto.'%');
        }
        $query=$this->db->get();
        
        $data=array(array());
        $i=0;
        foreach($query->result() as $row){
            $data[$i]['id_perfil']=$row->id_perfil;    
            $data[$i]['id_usuario']=$row->id_usuario;    
            $data[$i]['nombre']=$row->nombre;    
            $data[$i]['habilidades']=$row->habilidades;  
            $data[$i]['imagen']=$row->imagen;
            $data[$i]['id_ciudad']=$row->id_ciudad;
            $data[$i]['provincia']=$this->sacarProvincia($row->id_ciudad);
            $data[$i]['estudios']=$row->estudios;    
            $data[$i]['experiencia']=$row->experiencia;
            $data[$i]['nombre_user']=$this->mensajeria_model->getNombre($row->id_usuario);
            $i++;
        }
        return $data;
    }
    

}