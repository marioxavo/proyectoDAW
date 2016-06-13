<?php

class Mensajeria_model extends CI_Model
{


    public function __construct()
    {

        parent::__construct();
    }

    public function insertarMensaje($emisor,$receptor,$asunto,$mensaje){
        $data=array('id_emisor'=>$emisor,'id_receptor'=>$receptor,'asunto'=>$asunto,'mensaje'=>$mensaje);
        $this->db->insert('mensajes',$data);
    }

	
			public function marcarMensajeLeido($id_Mensaje){
								$data = array(
																			'leido' => 1,
																);
								$this->db->where('id_mensaje', $id_Mensaje);
								$this->db->update('mensajes', $data); 
				
			}
    public function sacarReceptorByNombre($nombre_usuario){
        $this->db->select('id');
        $this->db->from('usuarios');
        $this->db->where('nombre', $nombre_usuario);
        $query = $this->db->get();

        $data = '';
        foreach ($query->result() as $row) {
            $data = $row->id;
        }
        return $data;
    }

    public function getNombre($id_usuario){
        $this->db->select('nombre');
        $this->db->from('usuarios');
        $this->db->where('id', $id_usuario);
        $query = $this->db->get();

        $data = '';
        foreach ($query->result() as $row) {
            $data = $row->nombre;
        }
        return $data;
    }
    public function getMensajes($id_usuario)
    {
        /*{
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->where('nombre', $nombre);
            $this->db->where('password', $password);
            $query = $this->db->get();

            $data = array();
            foreach ($query->result() as $row) {
                $data['nombre'] = $row->nombre;
                $data['password'] = $row->password;
            }
            if (count($data) == 0) {
                return false;
            } else {
                return $data;
            }
        }*/
        $this->db->select('*');
        $this->db->from('mensajes');
        $this->db->where('id_receptor', $id_usuario);
        $this->db->order_by('fecha', "desc");
        $query = $this->db->get();

        $data = array();
        $lista = array();
        foreach ($query->result() as $row) {
            $data['id_mensaje'] = $row->id_mensaje;
            $data['id_emisor'] = $row->id_emisor;
            $data['id_receptor'] = $row->id_receptor;
            $data['asunto'] = $row->asunto;
            $data['mensaje'] = $row->mensaje;
            $data['fecha'] = $row->fecha;
            $data['leido'] = $row->leido;
            $data['nombre'] = $this->getNombre($row->id_emisor);
            array_push($lista, $data);
        }
        if (count($lista) == 0) {
            return false;
        } else {
            return $lista;
        }
    }
    public function getMensajesNuevos($id_usuario)
    {
        $this->db->select('*');
        $this->db->from('mensajes');
        $this->db->where('id_receptor', $id_usuario);
        $this->db->where('leido', 0);
        $this->db->order_by('fecha', "desc");

        $query = $this->db->get();

        $data = array();
        $lista = array();
        foreach ($query->result() as $row) {
            $data['id_mensaje'] = $row->id_mensaje;
            $data['id_emisor'] = $row->id_emisor;
            $data['id_receptor'] = $row->id_receptor;
            $data['asunto'] = $row->asunto;
            $data['mensaje'] = $row->mensaje;
            $data['fecha'] = $row->fecha;
            $data['leido'] = $row->leido;
            array_push($lista, $data);
        }
        if (count($lista) == 0) {
            return false;
        } else {
            return $lista;
        }
    }
    public function getTextoMensaje($id_mensaje)
    {
        $this->db->select('*');
        $this->db->from('mensajes');
        $this->db->where('id_mensaje', $id_mensaje);

        $query = $this->db->get();

        $data = array();
        foreach ($query->result() as $row) {
            $data['id_mensaje'] = $row->id_mensaje;
            $data['id_emisor'] = $row->id_emisor;
            $data['id_receptor'] = $row->id_receptor;
            $data['asunto'] = $row->asunto;
            $data['mensaje'] = $row->mensaje;
            $data['fecha'] = $row->fecha;
            $data['leido'] = $row->leido;
            $data['nombre'] = $this->getNombre($row->id_receptor);
        }
        if (count($data) == 0) {
            return false;
        } else {
            return $data;
        }
    }
    public function getMensajesEnviados($id_usuario)
    {
        $this->db->select('*');
        $this->db->from('mensajes');
        $this->db->where('id_emisor', $id_usuario);
        $this->db->order_by('fecha', "desc");

        $query = $this->db->get();

        $data = array();
        $lista = array();
        foreach ($query->result() as $row) {
            $data['id_mensaje'] = $row->id_mensaje;
            $data['id_emisor'] = $row->id_emisor;
            $data['id_receptor'] = $row->id_receptor;
            $data['asunto'] = $row->asunto;
            $data['mensaje'] = $row->mensaje;
            $data['fecha'] = $row->fecha;
            $data['leido'] = $row->leido;
            $data['nombre'] = $this->getNombre($row->id_receptor);
            array_push($lista, $data);
        }
        if (count($lista) == 0) {
            return false;
        } else {
            return $lista;
        }
    }

}
