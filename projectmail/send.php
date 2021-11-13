<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';
function sendEmail($recipient,$code) {
// Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
        $mail->isSMTP();// gửi mail SMTP
        $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
        $mail->SMTPAuth = true;// Enable SMTP authentication
        $mail->Username = 'duychip9901@gmail.com';// SMTP username
        $mail->Password = 'ncxppippdfrvprah'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 587; // TCP port to connect to
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom('duychip9901@gmail.com', 'test');

        $mail->addReplyTo('duychip9901@gmail.com', 'test');
        
        $mail->addAddress($recipient); // Add a recipient
        
        // Attachments
        // $mail->addAttachment('pdf/XTT/'.$data[11].'.pdf', $data[11].'_1.pdf'); // Add attachments
        // Optional name

        // Content
        $mail->isHTML(true);   // Set email format to HTML
        $tieude = 'PHPMAILER TEST - ĐIỂM DANH CHO EM VỚI Ạ!';
        $mail->Subject = $tieude;
        
        // Mail body content 
     
      
        
       
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        if($mail->send()){
            echo 'Thư đã được gửi đi';
        }else{
            echo 'Lỗi. Thư chưa gửi được';
        }  

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    }
?>
