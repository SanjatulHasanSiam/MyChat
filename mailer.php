<?php
  include('connect.php');
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  
  function sendMail($email,$otp,$msg){
    echo "In here";
      require ("./phpMailer/Exception.php");
      require ("./phpMailer/PHPMailer.php");
      require ("./phpMailer/SMTP.php");

      $mail= new PHPMailer(true);
      try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'piashpiash222@gmail.com';                     //SMTP username
        $mail->Password   = 'aemihptlcvaqpmhs';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('piashpiash222@gmail.com', 'Admin Confirmation');
        $mail->addAddress($email);     //Add a recipient
        $mail->From = 'piashpiash222@gmail.com';
        $mail->Sender = $email;

    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'MyChat OTP';
        $mail->Body    = "Your OTP for '$msg' is '$otp'";
    
        $mail->send();
       return true;
    } catch (Exception $e) {
        return false;
    }
  }
?>