<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Envio_correo extends CI_Controller {

 public function __construct(){
   parent::__construct();
   $this->load->model('model_correo');
   $this->load->library('session');
 }

 function enviar()
 {
   $data = $this->model_correo->getCorreo();
   
   include("class.phpmailer.php");
   include("class.smtp.php"); 
   foreach ($data as $value) {

      $config = Array(

      'protocol' => 'smtp',
      'smtp_host' => 'smtp.gmail.com',
      'smtp_port' => 465,
      'smtp_user' => 'juan@gmail.com',
      'smtp_pass' => '35432jj',
      'mailtype' => 'html',
      'charset' => 'utf8',
      'wordwrap' => TRUE
  );

      $mensaje = '';
      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");
      $this->email->from('krgrojas@gmail.com'); // change it to yours
      $this->email->to($value['destinatario']);
      $this->email->asunto($value['asunto']);
      $this->email->mensaje($value['usuario_mensaje']);
      if($this->email->enviar())
      {
        $this->model_correo->updateEstadoCorreo($value['id']);

      }
      else
      {
       show_error($this->email->print_debugger());
     }

     $urln = base_url()."correo/vista";
     redirect($urln);
     $this->email->insert($data);
   }
 }
}
