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
            $data[$i]['categoria']=$row->categoria;
            $data[$i]['candidatos']=$row->candidatos;
            $i++;
        }
        return $data;
        
    }


}