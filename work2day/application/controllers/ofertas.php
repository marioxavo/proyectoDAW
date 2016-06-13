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
        redirect('mensajeria/bandejaEntrada');
    }
    public function misOfertas(){
        $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$datosUsuario->nombre;
        
        $ofertas=$this->ofertas_model->sacarOfertas($datosUsuario->id);
        
        $data=array('nombre' => $nombre,'ofertas' => $ofertas,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
        
        $this->load->view('inicio/head.php');
        $this->load->view('ofertas/bandejaOfertas.php',$data);
    }
    
}