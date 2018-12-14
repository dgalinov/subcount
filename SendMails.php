<?php
error_reporting(0);

$daynumNow = $daynum = "";
$timeExplode = "";
$timeExplodeNow = date("G:i");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

require("db_connection.php");
$queryN = "SELECT * FROM newslettermail";
$queryC = "SELECT * FROM crontab WHERE name = 'Newsletter'";
$queryI = "SELECT * FROM information";


if (!$result = mysqli_query($con, $queryN)) {
    exit(mysqli_error($con));
} else {
    if (!$result2 = mysqli_query($con, $queryC)) {
        exit(mysqli_error($con));
    } else {
        if (!$result3 = mysqli_query($con, $queryI)) {
            exit(mysqli_error($con));
        } else {
            if (mysqli_num_rows($result2) > 0) {
                while ($row5 = mysqli_fetch_assoc($result2)) {
                    $daynumNOW = date("w");
                    $daynum = array(date("w", strtotime($row5['days'])));
                    $timeExplode = explode(" ", $row5['timePicker']);
                }
            }
            for ($x = 0; $x < sizeof($daynum); $x++) {
                echo $daynum[$x];
                if ($daynum[$x] == $daynumNOW) {
                    if ($timeExplode[0] == $timeExplodeNow) {
                        if (mysqli_num_rows($result3) > 0) {
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row3['counter'] == $row['id']) {
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
                                                $mail->addAddress($row3['email'], '');
                                                /*$mail->addAddress('ellen@example.com');
                                                $mail->addReplyTo('info@example.com', 'Information');
                                                $mail->addCC('cc@example.com');
                                                $mail->addBCC('bcc@example.com');

                                                $mail->addAttachment('/var/tmp/file.tar.gz');
                                                $mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/

                                                $body = $row2['content'];

                                                $mail->isHTML(true);
                                                $mail->Subject = $row2['subject'];
                                                $mail->Body = $body;
                                                $mail->AltBody = strip_tags($body);

                                                $mail->send();
                                                //echo 'Message has been sent';
                                            } catch (Exception $e) {
                                                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            echo "ERROR 3";
                        }
                    } else {
                        echo "ERROR 2";
                    }
                } else {
                    echo "ERROR 1";
                }
            }
        }
    }
}
