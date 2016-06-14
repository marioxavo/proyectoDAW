<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 10/06/2016
 * Time: 19:34
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Ofertas extends CI_Controller {
    public function index(){
        redirect('ofertas/misOfertas');
    }
    public function misOfertas(){
        $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$datosUsuario->nombre;
        
        $ofertas=$this->ofertas_model->sacarOfertas($datosUsuario->id);
        $categorias=$this->ofertas_model->sacarCategorias();
        $provincias=$this->ofertas_model->mostrarProvincias();
        
        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'ofertas' => $ofertas,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios,'categorias' => $categorias,'provincias' => $provincias);
        
        $this->load->view('inicio/head.php');
        $this->load->view('ofertas/bandejaOfertas.php',$data);
    }
    public function sacarOfertas(){
         $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$datosUsuario->nombre;
        
        $ofertas=$this->ofertas_model->ofertasCompleto();
        
        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'ofertas' => $ofertas,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
        
        $this->load->view('inicio/head.php');
        $this->load->view('ofertas/generalOfertas',$data);
    }
    public function apuntarseOferta($id){
        $ofertas=$this->ofertas_model->apuntarse($id,$_POST['id_usuario']);
         echo json_encode($ofertas);
    }
    public function refrescarOfertas($id){
         $ofertas=$this->ofertas_model->sacarOfertas($id);
         echo json_encode($ofertas);
    }
    public function crearOferta(){
        $ofertas=$this->ofertas_model->crearOferta($_POST['id_empresa'],$_POST['titulo'],$_POST['texto'],$_POST['categoria'],$_POST['provincia']);
        echo json_encode($ofertas);
    }
    public function actualizarOferta($id){
        $ofertas=$this->ofertas_model->actualizarOferta($id,$_POST['id_empresa'],$_POST['titulo'],$_POST['texto'],$_POST['categoria'],$_POST['provincia']);
        echo json_encode($ofertas);
    }
    
}