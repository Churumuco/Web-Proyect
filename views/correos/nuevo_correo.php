  <center>
    <img src= "http://3.bp.blogspot.com/-m_MLSrvRFlc/VijkJ0CjcJI/AAAAAAAAAG0/ayyvMZZNjhk/s1600/EmailLogo.png" width="250" height="130" />
  </center>
<div class="container ">

  <form class="form-horizontal" method="POST" action="<?php echo base_url();?>correo/insert/">
   <div class="form-group">
    <label  class="col-xs-4 control-label"></label>
    <div class="col-xs-4">
      <input type="email" class="form-control" name="usuario_email" placeholder="Digite el Destinario">
    </div>
  </div>
  <div class="form-group">
    <label  class="col-xs-4 control-label"></label>
    <div class="col-xs-4">
      <input type="text" class="form-control" name="usuario_asunto" placeholder="Digite el Asunto">
    </div>
  </div>
  <div class="form-group">
    <label  class="col-xs-4 control-label"></label>
    
     <div class="col-xs-4">
    <textarea name="usuario_mensaje" class="form-control" style=" width: 365px; height: 300px;">
    </textarea><br />
     </div>
	</div>
   
  <div class="row">
    <div class="col-sm-offset-4 col-xs-4">
      <button type="submit" class="btn btn-success btn-lg btn-block" name="enviar"><span class="glyphicon glyphicon-envelope"></span> Enviar Correo</button>
    </div>
  </div>
 </br>
  <div class="form-group">
    <div class="col-sm-offset-4 col-xs-4" >
      
      <a class="btn btn-danger btn-lg btn-block" href="<?php echo base_url();?>correo/vista/">Cancelar</a>
      </form>
    </div>
</form>
</div>