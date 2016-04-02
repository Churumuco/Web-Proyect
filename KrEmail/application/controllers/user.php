<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	//Se cargar las vistas correspondientes
	public function index()
	{
		$data['title'] = 'Pagina Inicio';
		$this->load->view('Plantillas/Header', $data);
		$this->load->view('correos/nav_principal');
		$this->load->view('usuario/login_usuario');
	}
	//Se cargar las vistas correspondientes
	public function loginUsuario(){
		$data['title'] = 'Pagina Inicio';
		$this->load->view('Plantillas/Header', $data);
		$this->load->view('correos/nav_principal');
		$this->load->view('usuario/login_usuario');
	}
	//Se cargar las vistas correspondientes
	public function registrarUsuario(){
		$data['title'] = 'Pagina Registro';
		$this->load->view('Plantillas/Header', $data);
		$this->load->view('usuario/registro_usuario');
	}
	//Se cargar las vistas correspondientes
	public function insertUsuario(){
			$pas = $this->input->post('usuario_password'); 
			$email = $this->input->post('usuario_correo');
			
			$encrip = md5($pas);
   			$data  = array(

   				'name' => $this->input->post('usuario_name') , 
				'user' => $this->input->post('usuario_username') , 
				'password' =>  $encrip,
				'estado' => 0 , 
				'email' => $email,
				);
   		
			$this->load->model('model_user','user');
			$check_user = $this->user->InUser($data);

			if (!empty($check_user)){
					
					$data = array('is_logued_in' => TRUE,
						'user_id' => $check_user->id,
						'username' => $check_user->name,
						'email' => $check_user->email
						);
					$this->session->set_userdata($data);	
			}else{
				redirect(base_url()."user/registrarUsuario");
			}
			
		$urln = base_url()."user/envioCorreo/?";
		
		redirect($urln);	
	}

	//Se autentifica si es el usuario correcto por medio del username y el password.
	public function validaUsuario(){
		$this->load->model('model_user', 'user');
		$user =$this->input->post('usuario_username');
    	$pass = $this->input->post('usuario_password'); 
		$encrip = md5($pass);
		$data['user'] = $this->user->getUser($user,$encrip);
		$user = $data['user'];
		
		if (!empty($user)){
			if ($user->estado == 1) {
				
				$data['id']=$user->id;
				$data['title'] = "Pagina Principal";
				$this->load->model('model_correo','correo');
				$pendiente = "pendiente";
				$id = $user->id;
				$emails= $this->correo->getAllBySalida($id,$pendiente);
				$data['emails'] = $emails;
				$enviado ="Enviado";
				$emaile = $this->correo->getAllByEnviado($id,$enviado);
				$data['emaile'] = $emaile;
				
				$check_user = $this->user->getSession($id);

			if (!empty($check_user)){
					
					$session_data = array('is_loged' => TRUE,
						'user_id' => $check_user->id,
						'username' => $check_user->name,
						'email' => $check_user->email,
						);
					$this->session->set_userdata('logged_in', $session_data);			
			}
				//Se cargar las vistas correspondientes
				$this->load->view('Plantillas/Header', $data);
				$this->load->view('correos/nav_correo');
         		$this->load->view('correos/correos_enviados', $data);
         		$this->load->view('Plantillas/Footer');
	
         	}else{
         		$urln = base_url()."user/loginUsuario";
			redirect($urln);
         	}
		}else{
				$urln = base_url()."user/loginUsuario";
			redirect($urln);	
		}
	}

	//Se verifica, si es el usuario correcto nos permite entrar al correo
	public function verificaUsuario(){
		$id = $_REQUEST['id'];
		$this->load->model('model_user','user');
		$this->user->verificaUser($id);
		$urln = base_url()."user/loginUsuario";
		redirect($urln);
	}
	
	//Metodos de el Phpmailer y el STMP para la realizacion de verificacion de correo y envios de correos.
	public function envioCorreo(){

		//Método de envío de correo para verificar el registro de un nuevo usuario
		include("class.phpmailer.php");
		include("class.smtp.php"); 
		$mail = new PHPMailer();


		//Se inicia la validacion del SMTP, en este caso es dende donde vendra el msn de notificacion
		//Para que funcione se tiene que configurar el correo de otra manera da error.
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl"; 
		$mail->Host = "smtp.gmail.com"; //El SMTP que estoy utilizando en este caso es Gmail
		$mail->Username = "krgrojas@gmail.com"; 
		$mail->Password = "542672512"; 
		$mail->Port = 465; 
		$email = $this->session->userdata('email');

		//Esto es lo que mostrará la notificacion enviada al correo
		$mail->From = $email; 
		$mail->FromName = "KR-Email";
		$mail->Subject = "Verificacion de Correo";
		$mail->AltBody = "¡Favor verificar su Correo!";  
		
		$id = $this->session->userdata('user_id');
		$link = base_url()."user/verificaUsuario/?id=$id";
		
		//Mensaje que se envia al correo del cliente para que este verifique su registro y este pueda entrar al correo.
		$mail->MsgHTML("<p>Estimado Cliente, si desea verificar si correo electronico favor dar click en el link adjunto.</p><a href=$link>Dar click para finalizar su Registro</a>"); 
		
		$mail->AddAddress($email); 
		$mail->IsHTML(true); 
		
		$exito = $mail->Send(); // Se envia el correo de verificacion correctamente.

		$this->session->unset_userdata('data');

		if($exito){
			
			$urln = base_url()."user/loginUsuario";
			
			redirect($urln);
		}else{
			echo "Hubo un Error. Contacte con el Administrador";
		}
		$urln = base_url()."user/envCorreos";
		redirect($urln);	
	}

	//Funcion para salir de la aplicacion y devolvernos al login.
	public  function salir()
	{
		$this->session->unset_userdata('data');
		$this->session->sess_destroy();
		return redirect('user/loginUsuario');
	}	
}

