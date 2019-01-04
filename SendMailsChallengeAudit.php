<?php
//error_reporting(0);
ini_set('display_errors', 'On');
$hourExplode = $minutes = $hour = $timeExplode = $dayNumNow = $dayNum = $emailsArray = "";
$hourNow = date("G");
$minutesNow = date("i");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';
$mail = new PHPMailer();
require("db_connection.php");
$queryN = "SELECT * FROM challengeauditmail";
$queryC = "SELECT * FROM crontab WHERE name = 'Challenge Audit'";
$queryI = "SELECT * FROM information WHERE challengeAuditSub = 1";


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
                    echo $dayNumNow;
                    $dayNum = array(date("w", strtotime($rowCronExplode['days'])));
                    $timeExplode = explode(" ", $rowCronExplode['timePicker']);
                    $hourExplode = explode(":", $timeExplode['0']);
                    $minutes = $hourExplode['1'];
                    $emailsArray = explode(",", $rowCronExplode['emails']);
                    if ($timeExplode['1'] == "PM") {
                        $hour = (int)$hourExplode['0'] + 12;
                    } else {
                        $hour = (int)$hourExplode['0'];
                    }
                    for ($x = 0; $x < sizeof($dayNum); $x++) {
                        if ($dayNum[$x] == $dayNumNOW) {
                            if (($hour == $hourNow) && ($minutes == $minutesNow)) {
                                if (mysqli_num_rows($resultInfo) > 0) {
                                    while ($rowInfo = mysqli_fetch_assoc($resultInfo)) {
                                        if (mysqli_num_rows($resultNewsletter) > 0) {
                                            while ($rowNewsletter = mysqli_fetch_assoc($resultNewsletter)) {
                                                if ($rowInfo['challengeAuditCounter'] == $rowNewsletter['id']) {
                                                    $emailsInfoArray = $rowInfo['email'];
                                                    for ($k = 0; $k < sizeof($emailsArray); $k++) {
                                                        try {
                                                            $mail->SMTPDebug = 0;
                                                            $mail->isSMTP();
                                                            $mail->Host = 'smtp.gmail.com';
                                                            $mail->SMTPAuth = true;
                                                            $mail->Username = $emailsArray[$k];
                                                            $mail->Password = 'successFOREVER';
                                                            $mail->SMTPSecure = 'ssl';
                                                            $mail->Port = 465;

                                                            $mail->setFrom('challengeaudit@telanto.com', 'Telanto');
                                                            $mail->addAddress($rowInfo['email'], $rowInfo['firstname']);

                                                            $body = $rowNewsletter['content'];

                                                            $mail->isHTML(true);
                                                            $mail->Subject = $rowNewsletter['subject'];
                                                            $mail->Body = $body;
                                                            $mail->AltBody = strip_tags($body);

                                                            // Cuando se envia un email se suma +1 al contador

                                                            $queryCounter = "UPDATE information SET challengeauditCounter = ".$rowInfo['challengeAuditCounter']."+1 WHERE ".$rowInfo['challengeAuditCounter']." = ".$rowNewsletter['id']." ";

                                                            if ($mail->send()) {
                                                            } else {
                                                                echo $mail->ErrorInfo;
                                                            }
                                                            echo 'Message has been sent';
                                                        } catch (Exception $e) {
                                                            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                                                        }
                                                    }
                                                    $queryZ = "INSERT INTO ChallengeAuditRecords (timeInserted, subject, content, sendFrom, sendTo) VALUES (NOW(), '" . $rowNewsletter['subject'] . "','" . $rowNewsletter['content'] . "', '" . $rowCronExplode['emails'] . "','" . $emailsInfoArray . "')";
                                                    $queryCounter = mysqli_query($con, $queryCounter);
                                                } else {
                                                    echo "There is no content to send";
                                                }
                                                $queryZ = mysqli_query($con, $queryZ);
                                            }
                                        }
                                    }
                                }
                            } else {
                                echo "No funciona TIME";
                            }
                        } else {
                            echo "No funciona DATE";
                        }
                    }
                }
            }
        }
    }
}
