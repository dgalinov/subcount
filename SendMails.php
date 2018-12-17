<?php
//error_reporting(0);
ini_set('display_errors', 'On');
$hourExplode = $minutes = $hour = $timeExplode = $dayNumNow = $dayNum = "";
$hourNow = date("G");
$minutesNow = date("i");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';
$mail = new PHPMailer();
require("db_connection.php");
$queryN = "SELECT * FROM newslettermail";
$queryC = "SELECT * FROM crontab WHERE name = 'Newsletter'";
$queryI = "SELECT * FROM information";


if (!$resultNewsletter = mysqli_query($con, $queryN)) {
    exit(mysqli_error($con));
} else {
    if (!$resultCron = mysqli_query($con, $queryC)) {
        exit(mysqli_error($con));
    } else {
        if (!$resultInfo = mysqli_query($con, $queryI)) {
            exit(mysqli_error($con));
        } else {
            if (mysqli_num_rows($resultCron) > 0) {
                while ($rowCronExplode = mysqli_fetch_assoc($resultCron)) {

                    $dayNumNOW = date("w");
                    $dayNum = array(date("w", strtotime($rowCronExplode['days'])));
                    $timeExplode = explode(" ", $rowCronExplode['timePicker']);
                    $hourExplode = explode(":", $timeExplode['0']);
                    $minutes = $hourExplode['1'];
                    if ($timeExplode['1'] == "PM") {
                        $hour = (int)$hourExplode['0'] + 12;
                    } else {
                        $hour = (int)$hourExplode['0'];
                    }
                    for ($x = 0; $x < sizeof($dayNum); $x++) {
                        if ($dayNum[$x] == $dayNumNOW) {
                            /*if ($hour == $hourNow) {
                                if ($minutes = $minutesNow) {*/
                            if (mysqli_num_rows($resultInfo) > 0) {
                                while ($row3 = mysqli_fetch_assoc($resultInfo)) {
                                    if (mysqli_num_rows($resultNewsletter) > 0) {
                                        while ($row = mysqli_fetch_assoc($resultNewsletter)) {
                                            if ($row3['counter'] == $row['id']) {
                                                try {
                                                    $mail->SMTPDebug = 0;
                                                    $mail->isSMTP();
                                                    $mail->Host = 'smtp.gmail.com';
                                                    $mail->SMTPAuth = true;
                                                    $mail->Username = 'success@telanto.com';
                                                    $mail->Password = 'successFOREVER';
                                                    $mail->SMTPSecure = 'ssl';
                                                    $mail->Port = 465;

                                                    $mail->setFrom('success@telanto.com', 'Telanto');
                                                    $mail->addAddress($row3['email'], $row3['firstname']);

                                                    $body = $row2['content'];

                                                    $mail->isHTML(true);
                                                    $mail->Subject = $row2['subject'];
                                                    $mail->Body = $body;
                                                    $mail->AltBody = strip_tags($body);

                                                    if ($mail->send()) {
                                                    } else {
                                                        echo $mail->ErrorInfo;
                                                    }
                                                    echo 'Message has been sent';
                                                } catch (Exception $e) {
                                                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                                                }
                                            }
                                        }
                                    }
                                }
                                /*}
                            }*/
                            }
                        }
                    }
                }
            }
        }
    }
}
