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
        $this->db->where('candidatos NOT LIKE','%'.$id_usuario.'%');
        $query=$this->db->get();
        $candidatos="";
        foreach($query->result() as $row){
            $candidatos=$row->candidatos;
        }
        if($candidatos==""){
           $candidatos=$id_usuario;
        }
        else{
            $candidatos.=';'.$id_usuario;
        }
        $data=array(
            'candidatos' => $candidatos
        );
         $this->db->where('id_oferta',$id);
        $this->db->update('ofertas',$data);
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

}