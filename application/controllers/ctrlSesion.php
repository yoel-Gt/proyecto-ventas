<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CtrlSesion extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('modelSesion_Caja');
		$this->load->library('encryption');
		$this->load->helper(array('download'));//este nos sirve para descargar archivos.
	}

	//inicio de sesion
	public function index(){

		$this->load->view('sistemaVentas/sesion');	
	}
	public function cierreSesion(){
		// $this->session->session_destroy();
		session_destroy();
		$this->load->view('sistemaVentas/sesion');
	}
	//dinero en caja
	public function sesion(){
		
		$usuario = $this->input->post('usuario');
		$contraseña = md5($this->input->post('contraseña'));
		// $this->encryption->encrypt(
		$result = $this->modelSesion_Caja->sesion($usuario, $contraseña);

		if (!$result) {
			$this->session->set_flashdata("error","el usuario y/o Contraseña son incorrectos");
			$this->load->view('sistemaVentas/sesion');
		}else{
			
			$datos = array('idusuario' => $result->idusuario,
				'nombre' => $result->nombre.' '.$result->apellido_P,
				'clave' => $result->clave,
				'login' => TRUE,
		);
			echo $this->session->set_userdata($datos);
		
			$result = $this->modelSesion_Caja->ValidaCaja();
			if ($result == 0) {
				$this->load->view('sistemaVentas/dineroCaja');
			}else{
				$activo['activo']='menuInicio';
				$this->load->view('diseñoweb/header');
				$this->load->view('diseñoweb/body',$activo);
				$this->load->view('sistemaVentas/contenidoPrincipal');
				$this->load->view('diseñoweb/footer');
			}
			
		}
		
	}
//--------------------CONTROL INGRESAR EFECTIVO
	public function entrarMenu(){
		$efectivo = $this->input->post('efectivo');

		$result = $this->modelSesion_Caja->dineroCaja($efectivo);

		if ($result == true) {
			$activo['activo']='menuInicio';
			$this->load->view('diseñoweb/header');
			$this->load->view('diseñoweb/body',$activo);
			$this->load->view('sistemaVentas/contenidoPrincipal');
			$this->load->view('diseñoweb/footer');
		}else{
			echo "algo salio mal";
		}
	}

//CREAR UNA SESION NUEVA
	public function crearSesion(){
		$data['error'] = "";
		$data['errorArch'] = "";
		$data['estado'] = "";
		$data['archivo'] = "";
		$this->load->view('sistemaVentas/crearSesion', $data);
	}

//REGISTRAR NUEVO USUARIO
	public function Crear_Sesion_User(){

		$config['upload_path'] = './assets/imagenes/empleados';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2048';//maximo de peso MB
		$config['max_width'] = '2024';//resolucion
		$config['max_height'] = '2008';//resolucion

		$this->load->library('upload',$config);

		if (!$this->upload->do_upload('imagen_empleado')) {
			$data['error'] = $this->upload->display_errors();
			$this->load->view('sistemaVentas/crearSesion',$data);
			# code...
		}else {
			$file_info = $this->upload->data();
			$this->crearMiniatura($file_info['file_name']);
			// $titulo = $this->input->post('titImagen');
			$imagen = $file_info['file_name'];
			
			// $subir = $this->modelSesion_Caja->subir($titulo,$imagen);
			// $subir = $this->modelSesion_Caja->subir($imagen);
			$data['error'] = $this->upload->display_errors();
			// $data['imagen'] = $imagen;

			$Nombre = $this->input->post('Nombre');
			$A_Paterno= $this->input->post('A_Paterno');
			$A_Materno = $this->input->post('A_Materno');
			$edad = $this->input->post('edad');
			$Usuario = $this->input->post('Usuario');
			$contraseña_A = md5($this->input->post('contraseña_A'));
	
			$validar_A  =$this->input->post('contraseña_A');
			$validar_B =$this->input->post('contraseña_B');
			if ($validar_A === $validar_B) {
				
				$result = $this->modelSesion_Caja->Crear_Sesion_User($Nombre,$A_Paterno,$A_Materno,$edad,$imagen,$Usuario,$contraseña_A);
				if ($result >0) {
					$dato = $this->modelSesion_Caja->Crear_Sesion_User_2($result,$Usuario,$contraseña_A);
				
					if ($dato == '1') {
					
						$this->load->view('sistemaVentas/sesion');
					}
	
				}
		
			}else{
				echo '<script type="text/javascript">
				alert("La contraseña No Coincide");
				</script>';
			   $this->load->view('sistemaVentas/crearSesion');
			}
			
		}
		
	}	

	function crearMiniatura($filename){//esta funcion Guardar en miniatura la imagen en la carpeta thumbs
		$config['image_library'] = 'gd2';
		$config['source_image'] = 'assets/imagenes/empleados/'. $filename;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['new_image'] = 'assets/imagenes/thumbs/';
		$config['thumb_marker'] = '';
		$config['max_width'] = '150';//resolucion
		$config['max_height'] = '150';
		$this->load->library('image_lib',$config);
		$this->image_lib->resize();



	}


	public function subirArchivo(){//PENDIENTE POR TERMINAR
		$config['upload_path'] = './assets/archivos/';
		$config['allowed_types'] = 'pdf|xlsx|docx|pptx';
		$config['max_size'] = '2048';//maximo de peso MB

		$this->load->library('upload',$config);

		if (!$this->upload->do_upload('fileImagen')) {
			$data['errorArch'] = $this->upload->display_errors(); 
			$this->load->view('sistemaVentas/crearSesion');
			# code...
		}else {
			$file_info = $this->upload->data();

			// $titulo = $this->input->post('tituloImagen');
			$archivo = $file_info['file_name'];
			$subir = $this->modelSesion_Caja->subirArchivo($archivo);
			$data['estado'] = "archivo subido.";
			$data['archivo'] = $archivo;
			$data['error'] = "";
			$data['errorArch'] = "";

			$this->load->view('diseñoweb/header');
			$this->load->view('diseñoweb/body');
			$this->load->view('sistemaVentas/contenidoPrincipal');
			$this->load->view('diseñoweb/footer');

		}
		
	}

	public function descargar($name){
		$data = file_get_contents('./assets/archivos/' . $name);
		force_download($name,$data);
	}

// ----------------------------------
}
