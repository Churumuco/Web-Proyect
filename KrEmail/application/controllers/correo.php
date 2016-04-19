<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Correo extends CI_Controller {

	public function nuevoCorreo() //Se cargan las vistas correspondientes
	{
		$data['title'] = 'Pagina Nuevo Correo';
		$this->load->view('Plantillas/Header', $data);
		$this->load->view('correos/nav_correo');
		$this->load->view('correos/nuevo_correo');
	}

	public function insertCorreo()//Se cargan las vistas correspondientes
	{
		$this->load->model('model_correo','correo');
		$email = $this->input->post('usuario_email'); 
		$asunto = $this->input->post('usuario_asunto');
		$mensaje = $this->input->post('usuario_mensaje');

		$session =  $this->session->userdata['logged_in'];

		if($session["is_loged"] == true){

			$id = $session['user_id'];

			$data  = array(
				'destinatario' =>  $email,
				'id_user' => $id , 
				'mensaje' => $mensaje,
				'asunto' => $asunto,
				'estado' => 'pendiente',
				);
			$this->correo->insertEmail($data);
			$urln = base_url()."correo/vistaCorreo/";
			redirect($urln);
		}
   			
		else{
			$urln = base_url()."user/loginUsuario";
			redirect($urln);
		}
	}
	//Se cargan las vistas correspondientes
	public function editarCorreo(){
		$session =  $this->session->userdata['logged_in'];

		if($session["is_loged"] == true){
		$id = $session['user_id'];
		$cid = $_REQUEST['cid'];
		$this->load->model('model_correo','correo');
		$correos = $this->correo->getEmailId($cid,$id);
		$data['email'] = $correos;
		
			if (!empty($data['email'])) {
				$data['title'] = 'Pagina Editar Correo';
				$this->load->view('Plantillas/Header', $data);
				$this->load->view('correos/nav_correo');
				$this->load->view('correos/edita_correo',$data);
			}else{
				$urln = base_url()."correo/vistaCorreo";
			redirect($urln);
			}
		
		}else{

			$urln = base_url()."user/loginUsuario";
			redirect($urln);
		}
	} 
	//Metodo para realizar un update o actualizar el correo que se edito previamente.
	public function updateCorreo(){
		$email = $this->input->post('usuario_email'); 
		$asunto = $this->input->post('usuario_asunto');
		$mensaje = $this->input->post('usuario_mensaje');
		$session =  $this->session->userdata['logged_in'];


		if($session["is_loged"] == true){
		$id = $session['user_id'];	

   			$data  = array(
				'destinatario' =>  $email, 
				'mensaje' => $mensaje,
				'asunto' => $asunto,
				);

   		$idc = $_REQUEST['cid'];
   		
   		$this->load->model('model_correo','correo');
   		$this->correo->updateEmail($idc,$data);
   		
   		$urln = base_url()."correo/vistaCorreo";
   		redirect($urln);
   		}
   		else{

   			$urln = base_url()."user/loginUsuario";
			redirect($urln);
   		}
	}
	//Metodo para eliminar el correo tanto de la base como del correo
	public function eliminarCorreo(){
		$session =  $this->session->userdata['logged_in'];

		if($session["is_loged"] == true){
		$id = $session['user_id'];
		$cid = $_REQUEST['cid'];

		$this->load->model('model_correo','correo');
		$v = $this->correo->deleteEmail($cid,$id);
		if ($v == 1) {
			$urln = base_url()."correo/vistaCorreo/";
		redirect($urln);
		}else{
			$urln = base_url()."correo/vistaCorreo/";
		redirect($urln);
		}
		}else{
			$urln = base_url()."user/loginUsuario";
			redirect($urln);
		}
	}

	//Metodo para mostrar los correos de salida y los correos enviados.
	public function vistaCorreo(){
			$session =  $this->session->userdata['logged_in'];

			if($session["is_loged"] == true){

				$this->load->model('model_correo','correo');
				$id = $session['user_id'];	
				$data['title'] = "Pagina Principal";
				$pendiente = "pendiente";
				
				$emails= $this->correo->getAllBySalida($id,$pendiente);
				$data['emails'] = $emails;
				$enviado ="Enviado";
				$emaile = $this->correo->getAllByEnviado($id,$enviado);
				$data['emaile'] = $emaile;
				
				$this->load->view('Plantillas/Header', $data);
				$this->load->view('correos/nav_correo');
         		$this->load->view('correos/correos_enviados', $data);
         		$this->load->view('Plantillas/Footer');
         	}else{
         		$urln = base_url()."user/loginUsuario";
			redirect($urln);
         	}
		}
	}


