<?php
/**
 * Created by PhpStorm.
 * User: DragomirGalinov
 * Date: 30/11/2018
 * Time: 9:30
 */

// Turn off all error reporting
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
            $mail = new PHPMailer();                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;
                $mail->Username = 'success@telanto.com';                 // SMTP username
                $mail->Password = 'successFOREVER';                     // SMTP password
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('success@telanto.com', 'Telanto');
                $mail->addAddress($_POST['email'], $_POST['firstname']);     // Add a recipient
                /*$mail->addAddress('ellen@example.com');               // Name is optional
                $mail->addReplyTo('info@example.com', 'Information');
                $mail->addCC('cc@example.com');
                $mail->addBCC('bcc@example.com');

                //Attachments
                $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                $mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/    // Optional name


                //Content

                $body = '<p>Hi,<br>Thanks for subscribing to ours newsletter of Telanto<br><br>Regards<br><br><a href="http://localhost/form/unsubscribe.php" target="_self">UNSUBSCRIBE</a></p>';

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
?>

