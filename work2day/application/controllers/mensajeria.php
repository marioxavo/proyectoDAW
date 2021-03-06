<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 10/06/2016
 * Time: 19:34
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Mensajeria extends CI_Controller {
    public function index(){
        redirect('mensajeria/bandejaEntrada');
    }
    public function verMensajesUser($id){
        $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$this->mensajeria_model->getNombre($datosUsuario->id);
        
        $mensajes=$this->mensajeria_model->sacarMensajesCompleto($id);
        $recibidos=json_encode($mensajes['recibidos']);
        $enviados=json_encode($mensajes['enviados']);
        
          $data=array('id_usuario' => $datosUsuario->id,'recibidos' => $recibidos ,'enviados' => $enviados, 'nombre' => $nombre,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
         $this->load->view('inicio/head.php');
        $this->load->view('mensajes/mensajesUsuario.php',$data);
    }
    public function leermensaje($id_mensaje){
        $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$this->mensajeria_model->getNombre($datosUsuario->id);
        $mensaje=$this->mensajeria_model->getTextoMensaje($id_mensaje);
        $data=array('id_usuario' => $datosUsuario->id,'mensaje' => $mensaje,'nombre' => $nombre,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
        $this->mensajeria_model->marcarMensajeLeido($id_mensaje);

        $this->load->view('inicio/head.php');
        $this->load->view('mensajes/leermensaje.php',$data);
    }

    public function redactarMensaje($error=0,$acierto=null){
        $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$this->mensajeria_model->getNombre($datosUsuario->id);
        $nr="";
        if(isset($_GET['nr'])){
            $nr=$_GET['nr'];
        }
        $errorMensaje='';
        if($error==1){
            $errorMensaje="La persona a la que le estás enviando el mensaje no existe.";
        }
        elseif($error==2){
            $errorMensaje="Error, todos los campos son obligatorios.";
        }
        elseif($error==3){
            $acierto="El mensaje ha sido enviado con éxito.";
        }

        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'error' => $errorMensaje,'acierto' => $acierto,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios, 'nombreReceptor' => $nr);
        $this->load->view('inicio/head.php');
        $this->load->view('mensajes/redactarmensaje.php',$data);
    }

    public function enviarMensaje(){
        $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $this->form_validation->set_rules('emisor', 'emisor', 'trim|required|min_length[1]|max_length[150]');
        $this->form_validation->set_rules('receptor', 'receptor', 'trim|required|min_length[1]|max_length[150]');
        $this->form_validation->set_rules('asunto', 'asunto', 'trim|required|min_length[1]|max_length[150]');
        $this->form_validation->set_rules('mensaje', 'mensaje', 'trim|required|min_length[1]|max_length[1000]');
        if( $this->form_validation->run() ){
            $emisor=$datosUsuario->id;
            $receptor=$this->mensajeria_model->sacarReceptorByNombre($this->input->post('receptor'));
            $asunto=$this->input->post('asunto');
            $mensaje=$this->input->post('mensaje');
            if($receptor!=''){
                $this->mensajeria_model->insertarMensaje($emisor,$receptor,$asunto,$mensaje);
                redirect('mensajeria/redactarMensaje/3');
            }
            else{
                redirect('mensajeria/redactarMensaje/1');
            }
        }
        else{
            redirect('mensajeria/redactarMensaje/2');
        }
    }


    public function bandejaEntrada(){
        $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$this->mensajeria_model->getNombre($datosUsuario->id);
        $mensajes=$this->mensajeria_model->getMensajes($datosUsuario->id);
        $mensajesEnviados=$this->mensajeria_model->getMensajesEnviados($datosUsuario->id);
        $p=json_encode($mensajes);
        $p2=json_encode($mensajesEnviados);
        $data=array('id_usuario' => $datosUsuario->id,'mensajes' => $p,'mensajesEnviados' => $p2,'nombre'=>$nombre,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
        $this->load->view('inicio/head.php');
        $this->load->view('mensajes/mensajes.php',$data);
    }
    public function getMensajesNuevos(){
        $mensajes=$this->mensajeria_model->getMensajesNuevos($_POST['id_usuario']);
        $p=json_encode($mensajes);
        echo $p;
    }
    public function getMensajesEnviados(){
        $mensajes=$this->mensajeria_model->getMensajesEnviados($_POST['id_usuario']);
        $p=json_encode($mensajes);
        echo $p;
    }
		    public function redactarMensajeAdmin($error=0,$acierto=null){
        $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $nombre=$this->mensajeria_model->getNombre($datosUsuario->id);
        $errorMensaje='';
        if($error==1){
            $errorMensaje="La persona a la que le estás enviando el mensaje no existe.";
        }
        elseif($error==2){
            $errorMensaje="Error, todos los campos son obligatorios.";
        }
        elseif($error==3){
            $acierto="El mensaje ha sido enviado con éxito.";
        }

        $data=array('id_usuario' => $datosUsuario->id,'nombre' => $nombre,'error' => $errorMensaje,'acierto' => $acierto,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
        $this->load->view('inicio/head.php');
        $this->load->view('mensajes/redactarmensajeadmin.php',$data);
    }
public function enviarMensajeAdmin(){
        $daniel=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($daniel);
        $this->form_validation->set_rules('emisor', 'emisor', 'trim|required|min_length[1]|max_length[150]');
        $this->form_validation->set_rules('receptor', 'receptor', 'trim|required|min_length[1]|max_length[150]');
        $this->form_validation->set_rules('asunto', 'asunto', 'trim|required|min_length[1]|max_length[150]');
        $this->form_validation->set_rules('mensaje', 'mensaje', 'trim|required|min_length[1]|max_length[1000]');
        if( $this->form_validation->run() ){
            $emisor=$datosUsuario->id;
            $receptor=$this->mensajeria_model->sacarReceptorByNombre($this->input->post('receptor'));
            $asunto=$this->input->post('asunto');
            $mensaje=$this->input->post('mensaje');
            if($receptor!=''){
                $this->mensajeria_model->insertarMensaje($emisor,$receptor,$asunto,$mensaje);
                redirect('mensajeria/redactarmensajeadmin/3');
            }
            else{
                redirect('mensajeria/redactarmensajeadmin/1');
            }
        }
        else{
            redirect('mensajeria/redactarmensajeadmin/2');
        }
    }
    public function borrarMensaje($id){
        $this->mensajeria_model->borrarMensaje($id);
        redirect('mensajeria/bandejaEntrada');
    }
}