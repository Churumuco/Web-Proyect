<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Envio_correo extends CI_Controller {

 public function __construct(){
   parent::__construct();
   $this->load->model('model_correo');
   $this->load->library('session');
 }

//Metodo para enviar el correo correctamente
 function enviar()
 {
   $data = $this->model_correo->getCorreo();
   
   include("class.phpmailer.php");
   include("class.smtp.php"); 
   foreach ($data as $value) {


    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'smtp.mandrillapp.com',
      'smtp_port' => 587,
      'smtp_user' => 'regus@hotmail.com',
      'smtp_pass' => 'NlXJVAqPJPDrEYj-e-jgjQ',
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
  );
      
      //Esto es como para saber quien lo envia en caso de que se cambie dentro del parentesis en la sintasix $this->email->from(''); 
      //El que envia el mensaje seria el que se coloque aqui en este caso coloque uno completamente ficticio en caso de que diera errores
      $message = '';
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('KrEmail@hotmail.com');
      $this->email->to($value['destinatario']);
      $this->email->subject($value['asunto']);
      $this->email->message($value['mensaje']);
      if($this->email->send())
      {
        $this->model_correo->updateEstadoCorreo($value['id']);
      }
      else
      {
       show_error($this->email->print_debugger());
     }
     $urln = base_url()."correo/vistaCorreo";
     redirect($urln);
     $this->email->insert($data);
   }
 }
}
