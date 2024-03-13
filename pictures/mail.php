<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    function send_mail($recipient, $subject, $message){

        $mail = new PHPMailer();
        $mail->IsSMTP();

        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = "tls"; 
        $mail->Port = 587;
        $mail->Host = "smtp.gmail.com";
        $mail->Username = "musasibeko61@gmail.com";
        $mail->Password = "qdbvuzxehceyhawo";

        $mail->IsHTML(true);
        $mail->AddAddress($recipient, "recipient-name");
        $mail->SetFrom("musasibeko61@gmail.com", "WeSkate.com");
        //$mail->AddReplyTo("reply-to-email", "reply-to-email");
        //$mail->AddCC("cc-recipient-email", "cc-recipient-email");
        $mail->$subject = $subject;
        $content = $message;

        $mail->MsgHTML($content);
        if (!$mail->Send()) {
           /* echo "ERROR! while sending Email";
            Var_dump($mail);*/
            return false;
        } else {
           // echo "Email Sent successfully";
            return true;
        }
    }
?>