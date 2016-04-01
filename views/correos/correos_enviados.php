<div class='container'>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="salida">
      <br/>
     
      <a href="<?php echo base_url();?>correo/nuevo" class="btn btn-info"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Nuevo Correo</a>
      <br/>
      <br/>
      <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
            <tr>
              <th>ID</th>
              <th>Destinatario</th>
              <th>Asunto</th>
              <th>Mensaje</th>
              <th></th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($emails as $email) { ?>
            
            <tr>
              <td><?php echo $email['id']; ?></td>
              <td><?php echo $email['destinatario']; ?></td>
              <td><?php echo $email['asunto']; ?></td>
              <td><?php echo $email['mensaje']; ?></td>
              <td>
                  <a href="<?php echo base_url();?>correo/edita_correo/?cid=<?php echo $email['id']?>"><span class="glyphicon glyphicon-edit">Editar</a>
                  <a href="<?php echo base_url();?>correo/eliminar/?cid=<?php echo $email['id']?>" onClick="return confirm('¿Seguro que desea eliminar el correo?');"><span class="glyphicon glyphicon-trash">Eliminar</a>
                 <a href="<?php echo base_url();?>envio_correo/enviar" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Enviar</a>
                 
              </td> 
            </tr>
            <?php }?>
        </tbody>
      </table>
      </div>
    </div>
    
    <div role="tabpanel" class="tab-pane" id="envio_correo">
      <br/>
      <div class="table-responsive">
      <table class="table table-hover">
        <thead>
            <tr>
              <th>ID</th>
              <th>Destinatario</th>
              <th>Asunto</th>
              <th>Mensaje</th>
              <th></th>
            </tr>
        </thead>
        <tbody>
          
         <?php foreach ($emaile as $emailv) { ?>  
            <tr>
              <td><?php echo $emailv['id']; ?></td>
              <td><?php echo $emailv['destinatario']; ?></td>
              <td><?php echo $emailv['asunto']; ?></td>
              <td><?php echo $emailv['mensaje']; ?></td>      
              <td>
                  <a href="<?php echo base_url();?>correo/eliminar/?cid=<?php echo $emailv['id']?>" onClick="return confirm('¿Seguro que desea eliminar el correo?');"><span class="glyphicon glyphicon-trash">Eliminar</a>
                  <a href="<?php echo base_url();?>envio_correo/enviar" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Enviar</a>
              </td>     
            </tr>
            <?php }?>
        </tbody>
      </table>
      </div>
      </div>
      <div role="tabpanel" class="tab-pane" id="salir">
        </br>
        <center><a href="<?php echo base_url();?>user/login" class="btn btn-danger"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Logout</a>
      </center>
      </div>
    </div>
    </div>