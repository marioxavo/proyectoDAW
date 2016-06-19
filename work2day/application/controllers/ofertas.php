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
    public function verPerfil($id){
        $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$datosUsuario->nombre;

        $perfil=$this->usuarios_model->sacarPerfil($id);

        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios, 'perfil' => $perfil);

        $this->load->view('inicio/head.php');
        $this->load->view('ofertas/verPerfil.php',$data);
    }
    public function verPerfilE($id){
        $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$datosUsuario->nombre;

        $perfil=$this->usuarios_model->sacarPerfilEmpresa($id);

        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios, 'perfil' => $perfil);

        $this->load->view('inicio/head.php');
        $this->load->view('ofertas/verPerfilEmpresa.php',$data);
    }

    public function misOfertas(){
        $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$datosUsuario->nombre;
         $provincias=$this->ofertas_model->mostrarProvincias();
        $ofertas=$this->ofertas_model->sacarOfertas($datosUsuario->id);
        $categorias=$this->ofertas_model->sacarCategorias();
        
        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'ofertas' => $ofertas,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios,'categorias' => $categorias,'provincias' => $provincias);
        
        $this->load->view('inicio/head.php');
        $this->load->view('ofertas/bandejaOfertas.php',$data);
    }
    public function sacarOfertas(){
         $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$datosUsuario->nombre;
       
        
        $mensaje="Últimas ofertas";
        $ofertas=$this->ofertas_model->ofertasCompleto();
        $provincias=$this->ofertas_model->sacarProvincias();
        
        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'ofertas' => $ofertas,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios,'mensaje' => $mensaje,'provincias' => $provincias);
        
        $this->load->view('inicio/head.php');
        $this->load->view('ofertas/generalOfertas',$data);
    }
    public function misOfertasT(){
         $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$datosUsuario->nombre;
        
        $ofertas=$this->ofertas_model->misOfertasT($datosUsuario->id);
        
        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'ofertas' => $ofertas,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
        
        $this->load->view('inicio/head.php');
        $this->load->view('ofertas/misOfertasT',$data);
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