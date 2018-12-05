<?php
error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

require("db_connection.php");
$query = "SELECT * FROM newslettermail ";

if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
} else {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $mail = new PHPMailer();
            try {
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'success@telanto.com';
                $mail->Password = 'successFOREVER';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                //Recipients
                $mail->setFrom($row['emails'], 'Telanto');
                $mail->addAddress($_POST['email'], '');
                /*$mail->addAddress('ellen@example.com');
                $mail->addReplyTo('info@example.com', 'Information');
                $mail->addCC('cc@example.com');
                $mail->addBCC('bcc@example.com');

                $mail->addAttachment('/var/tmp/file.tar.gz');
                $mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/

                $body = $_POST;

                $mail->isHTML(true);
                $mail->Subject = 'Telanto';
                $mail->Body    = $body;
                $mail->AltBody = strip_tags($body);

                $mail->send();
                //echo 'Message has been sent';
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        }
    }
}


