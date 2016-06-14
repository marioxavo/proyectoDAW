<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function editarPerfilT(){
        $comprobarLogin=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($comprobarLogin);
        $nombre=$this->mensajeria_model->getNombre($datosUsuario->id);

        if($datosUsuario->id_grupo_usuarios==1){
            $perfilUsuario=$this->usuarios_model->sacarPerfil($datosUsuario->id);
             $data=array('perfilUsuario'=> $perfilUsuario,'nombre'=> $nombre,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
        $this->load->view('usuarios/editarPerfilT',$data);
        }
        elseif($datosUsuario->id_grupo_usuarios==2){
            $perfilUsuario=$this->usuarios_model->sacarPerfilEmpresa($datosUsuario->id);
             $data=array('perfilUsuario'=> $perfilUsuario,'nombre'=> $nombre,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
            $this->load->view('usuarios/editarPerfilE',$data);
        }
    }

    public function insertarImagenT(){
        $ruta=$this->config->item('app_url')."template/img/imgPerfilT/";//ruta carpeta donde queremos copiar las imágenes
        $uploadfile_temporal=$_FILES['imagen']['tmp_name'];
        $uploadfile_nombre=$ruta.$_FILES['imagen']['name'];

        if (is_uploaded_file($uploadfile_temporal))
        {
            move_uploaded_file($uploadfile_temporal,$uploadfile_nombre);
        }
        else
        {
            echo "error";
        }
        $directorio=opendir($ruta);
        while($ficheros=readdir($directorio))
        {
            $url=$ruta.$ficheros;
            echo "<img src=".$url.">";
        }
    }

	public function actualizarPerfilT(){
        $perfilUsuario=$this->usuarios_model->actualizarPerfil($_POST['id_usuario'],$_POST['nombre'],$_POST['habilidades'],$_POST['estudios'],$_POST['experiencia']);
        echo $perfilUsuario;
    }
    public function actualizarPerfilE(){
        $perfilUsuario=$this->usuarios_model->actualizarPerfilEmpresa($_POST['id_usuario'],$_POST['titulo'],$_POST['descripcion']);
        echo $perfilUsuario;
    }
    public function refrescarPerfilT(){
        $perfilUsuario=$this->usuarios_model->sacarPerfil($_POST['id_usuario']);
        $p=json_encode($perfilUsuario);
        echo $p;
    }
    public function refrescarPerfilE(){
        $perfilUsuario=$this->usuarios_model->sacarPerfilEmpresa($_POST['id_usuario']);
        $p=json_encode($perfilUsuario);
        echo $p;
    }
	
	public function editarCuenta(){
        $comprobarLogin=$this->login_work->isLogged();
        $datosUsuario=$this->login_model->verUsuario($comprobarLogin);
        $nombre=$this->mensajeria_model->getNombre($datosUsuario->id);
        
        
        $cuentaUsuario=$this->usuarios_model->sacarCuenta($datosUsuario->id);
        $data=array('cuentaUsuario'=> $cuentaUsuario,'nombre'=> $nombre,'id_grupo_usuarios' => $datosUsuario->id_grupo_usuarios);
        $this->load->view('usuarios/editarCuenta',$data);
        
        
    }
  public function actualizarCuenta(){
        $cuentaUsuario=$this->usuarios_model->actualizarCuenta($_POST['id_cuenta'],$_POST['email'],$_POST['password']);
        $this->login_work->processLogin($cuentaUsuario['nombre'],$cuentaUsuario['password']);
        echo json_encode($cuentaUsuario);
    }
		public function refrescarCuenta(){
        $cuentaUsuario=$this->usuarios_model->sacarCuenta($_POST['id_cuenta']);
        $p=json_encode($cuentaUsuario);
        echo $p;
    }
}
