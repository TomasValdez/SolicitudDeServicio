
    <?php
    
    include 'Connect/conecct.php';
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    // Instantiation and passing `true` enables exceptions
    $type_Ser=$_POST['solicitud'];
    $mailUser=$_POST['mail'];
 
    $mail = new PHPMailer(true);

    $otro="";
      $conection=new Connection_db();
      $conection->conexion();
      $conection->consulta_typeservice();

      if ( $conection->registration_request($type_Ser,$mailUser)){

      echo "insertado";
    
      try {
          //Server settings
          $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
          $mail->isSMTP();                                            // Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = '@gmail.com';                     // SMTP username
          $mail->Password   = '';                               // SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
          $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
      
          //Recipients
          $mail->setFrom('@gmail.com');
          $mail->addAddress('@gmail.com', 'roberto');     // Add a recipient
         
        
          // Content
        //  $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'Vereficiacion de Servicio';
      
    if(isset($_POST["otro"])){
  
        $mail->Body    = $_POST["otro"];
      
    }else {
        $mail->Body    =   "http://localhost:8066/Proyect/Verificacion.php?solicitud=".$name;
   
    }
    //crear el url para que podamos
        
          $mail->send();
          echo 'Message has been sent';
      
      } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    }
    else {
        
    }
    ?>