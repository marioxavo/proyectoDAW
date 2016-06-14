<?php

class Ofertas_model extends CI_Model
{


    public function __construct()
    {

        parent::__construct();
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
            $data[$i]['texto_oferta']=$row->texto_oferta;
            $data[$i]['nombre_empresa']=$this->mensajeria_model->getNombre($row->id_empresa);
            $data[$i]['categoria']=$row->categoria;
            $data[$i]['candidatos']=$row->candidatos;
            $candidatos=explode(';',$row->candidatos);
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
            $data[$i]['texto_oferta']=$row->texto_oferta;
            $data[$i]['nombre_empresa']=$this->mensajeria_model->getNombre($row->id_empresa);
            $data[$i]['categoria']=$row->categoria;
            $data[$i]['candidatos']=$row->candidatos;
             $candidatos=explode(';',$row->candidatos);
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
    public function crearOferta($id,$texto,$categoria){
        $data=array(
            'id_empresa' => $id,
            'texto_oferta' => $texto,
            'categoria' => $categoria
        );
        $this->db->insert('ofertas',$data);
        return $this->sacarOfertas($id);
    }
     public function actualizarOferta($id_oferta,$id,$texto,$categoria){
        $data=array(
            'texto_oferta' => $texto,
            'categoria' => $categoria
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

}