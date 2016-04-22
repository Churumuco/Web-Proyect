<?php if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ParaCorreos.css" media="all">
    </head>
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
     <div class="container-fluid">
          <!-- Esta es la seccion del header-->
          <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
          </div>
          <!-- La seccion del menu donde va lo de los correos salida y enviados -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
               <ul class="nav navbar-nav navbar-left">
               <li role="presentation" class="active"><a href="#salida" aria-controls="salida" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-folder-close"></span> Correos Salida</a></li>
                <li role="presentation"><a href="#enviados" aria-controls="enviados" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-folder-open"></span> Correos Enviados</a></li>
                <li role="presentation"><a href="<?php echo base_url();?>correo/nuevoCorreo"><span class="glyphicon glyphicon-plus"></span> Nuevo Correo</a></li>
           </ul>
               <ul class="nav navbar-nav navbar-right">
               <li><a><span class="glyphicon glyphicon-user"></span> Bienvenido <?php echo $username ?></a></li>
               <li><a href="<?php echo base_url('user/salir') ?>"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
               </ul>
          </div>
     </div>
</nav>


