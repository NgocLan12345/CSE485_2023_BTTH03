<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MyEmailServer implements EmailServerInterface
{
    public function sendEmail($to, $name, $subject, $content)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = false;                              //Enable verbose debug output
            $mail->isSMTP();                                       //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                        //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                //Enable SMTP authentication
            $mail->Username   = 'dongoclan2479@gmail.com';         //SMTP username
            $mail->Password   = 'ixpvkqedxrifmsiu';                //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;       //Enable implicit TLS encryption
            $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet = 'UTF-8';

            //Recipients
            $mail->setFrom('dongoclan2479@gmail.com', 'Ngoc Lan'); 
            $mail->addAddress($to, $name); //Add a recipient

            //Content
            $mail->isHTML(true); //khai báo nội dung email hiển thị định dạng HTML
            $mail->Subject = $subject; //chủ đề email
            $mail->Body = "$content. <i><u>Hello</u></i>"; //khai báo nội dung thư(định dạng HTML)

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>