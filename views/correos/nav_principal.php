<?php if (isset($this->session->userdata['logged_in'])) {
     $log = ($this->session->userdata['logged_in']['is_loged']);
     $username = ($this->session->userdata['logged_in']['username']);
     $email = ($this->session->userdata['logged_in']['email']);
} ?>
<nav class="navbar navbar-inverse" role="navigation">
     <div class="container-fluid">
          <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
          </div>
          <div class="collapse navbar-collapse navbar-ex1-collapse">
               <ul class="nav navbar-nav navbar-right">
                   <?php 
                    
                    if (!empty($log)) {
                         if($log == true) {
                             
                              echo "<li><a href=".base_url('correo/vista').">Bienvenido ".$username."</a></li>";
                              echo "<li><a href=".base_url('user/logout').">Salir</a></li>";
                         } else{
                              echo "<li><a href=".base_url('user/login').">Login</a></li>";
                              echo "<li><a href=".base_url('user/registrar').">Registrar</a></li>";
                         }

                    }else{
                          echo "<li><a href=".base_url('user/login').">Login</a></li>";
                    echo "<li><a href=".base_url('user/registrar').">Registrar Usuario</a></li>";
                    }
              ?> 
               </ul>
          </div>
     </div>
</nav>