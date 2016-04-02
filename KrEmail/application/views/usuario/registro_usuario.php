<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/General.css" media="all">
    </head>
<div class="container">
  <center>
    <img src= "http://3.bp.blogspot.com/-m_MLSrvRFlc/VijkJ0CjcJI/AAAAAAAAAG0/ayyvMZZNjhk/s1600/EmailLogo.png" width="250" height="130" />
  </center>
  <body>
  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>user/insertUsuario">
   <div class="form-group">
    <label  class="col-xs-4 control-label"></label>
    <div class="col-xs-4">
      <input type="text" class="form-control" name="usuario_username" placeholder="Digite su Username" title="Debe tener 3 o más Caracteres." required>
    </div>
  </div>
  <div class="form-group">
    <label  class="col-xs-4 control-label"></label>
    <div class="col-xs-4">
      <input type="password" class="form-control" name="usuario_password" placeholder="Digite su Contraseña" title="Debe tener 3 o más Caracteres." required>
    </div>
  </div>
  <div class="form-group">
    <label  class="col-xs-4 control-label"></label>
    <div class="col-xs-4">
      <input type="text" class="form-control" name="usuario_name" placeholder="Digite su Nombre" title="Debe tener 3 o más Caracteres." required>
    </div>
  </div>
  <div class="form-group">
    <label  class="col-xs-4 control-label"></label>
    <div class="col-xs-4">
      <input type="email" class="form-control" name="usuario_correo" placeholder="Digite su Correo Electrónico" title="Debe tener el formato correcto." required>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-offset-4 col-xs-4">
      <button type="submit" class="btn btn-info btn-lg btn-block" name="guardar"> <span class="glyphicon glyphicon-user"></span> Finalizar Registro</button>
    </div>
  </div>
</br>
  <div class="form-group">
    <div class="col-sm-offset-4 col-xs-4" >
      <a class="btn btn-danger btn-lg btn-block" href="<?php echo base_url();?>user/loginUsuario">Cancelar</a>
      </form>
    </div>
</form>
</div>
</body>
<html>