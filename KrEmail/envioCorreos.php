    <?php 

    include("class.phpmailer.php");
    include("class.smtp.php"); 

    $servername= '127.0.0.1';
    $user = 'root';
    $password = '';

    	function getCorreos($servername,$user,$password){
    		try {
        		$conn = new PDO("mysql:host=$servername;dbname=kremail", $user,$password);
                // set the PDO error mode to exception
        		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          		$stmt = $conn->query("SELECT `id`,`destinatario`,`id_user`,`asunto`,`mensaje` FROM `emails` WHERE  `estado` = 'Pendiente' ");
    	
    			return $stmt->fetchAll(PDO::FETCH_OBJ);
    			}
    			catch(PDOException $e)
        		{
        			echo "Connection failed: " . $e->getMessage();
        		}
        }

        function getUsers($servername,$user,$password){
        	try {
        		$conn = new PDO("mysql:host=$servername;dbname=kremail", $user,$password);
       
        	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
    		$stmt = $conn->query("SELECT * FROM `users`");
    		return $stmt->fetchAll(PDO::FETCH_OBJ);

        	} catch (Exception $e) {
        			echo "Connection failed: " . $e->getMessage();
        	}
        }

        $users = getUsers($servername,$user,$password);
        $correos = getCorreos($servername,$user,$password);
        foreach ($correos as $correo) {
         	
        		$idus = $correo->id_user;

        		foreach ($users as $user) {
        				$idn = $user->id;
        				if ($idn == $idus) {
        				$name = $user->name;
        				$email = $user->email;
        			}
        		}

    	       if (count($correos) > 0) {
    			$mail = new PHPMailer();

                //Luego tenemos que iniciar la validación por SMTP:
    			$mail->IsSMTP();
    			$mail->SMTPAuth = true;
    			$mail->SMTPSecure = "ssl"; 
    			$mail->Host = "smtp.gmail.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
    			$mail->Username = "krgrojas@gmail.com"; 
    			$mail->Password = "542672512"; 
    			$mail->Port = 465; 
    			
    			$mail->From = $email; 
    			$mail->FromName = $name;
    			$mail->Subject = $correo->asunto;
    			$mail->AltBody = "Este es un mensaje";  
    			$mail->MsgHTML($correo->mensaje); 
    		
    			$mail->AddAddress($correo->destinatario); 
    			$mail->IsHTML(true); 
    		
    			$exito = $mail->Send(); // Envía el correo.
    			echo "Correo enviado ";

                if($exito){
                    try {
                     $servername= '127.0.0.1';
                     $user = 'root';
                     $conn = new PDO("mysql:host=$servername;dbname=kremail", $user,$password);
                     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                     echo "Conexion Exitosa" . "\n"; 


                     $sql2 = sprintf("UPDATE `emails` SET `estado`='Enviado' WHERE `id`=".$correo->id);
                     $stmt = $conn->prepare($sql2);  

                     $stmt->execute();

                     echo $stmt->rowCount() . " Correo enviado Correctamente" ."\n" ;
                 }
                 catch(PDOException $e)
                 {
                     echo "Conexion Fallida: " . $e->getMessage();
                 }
    	   }
    	else
    	   {
    			echo "Hubo un Error. Contacte con el administrador";
    	   }

    	}
    }	
    	



		
		
