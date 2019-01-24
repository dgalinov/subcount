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
$queryInfo = "SELECT * FROM information WHERE newsletterSub = 1";
$queryCron = "SELECT * FROM newsletterCron";
$queryMail = "SELECT * FROM newsletterMail";
$queryEvents = "SELECT * FROM newsletterEvents";


/**
 * @param PHPMailer $mail
 * @param array $emailsArray
 * @param $k
 * @param $rowInfo
 * @param $rowMail
 * @return string
 */
function sendMail(PHPMailer $mail, array $emailsArray, $k, $rowInfo, $rowMail)
{
    try {
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $emailsArray[$k];
        $mail->Password = 'successFOREVER';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('newsletter@telanto.com', 'Telanto');
        $mail->addAddress($rowInfo['email'], $rowInfo['firstname']);

        $body = $rowMail['content'];

        $mail->isHTML(true);
        $mail->Subject = $rowMail['subject'];
        $mail->Body = $body;
        $mail->AltBody = strip_tags($body);

        // Cuando se envia un email se suma +1 al contador

        $queryCounter = "UPDATE information SET newsletterCounter = " . $rowInfo['newsletterCounter'] . "+1 WHERE " . $rowInfo['newsletterCounter'] . " = " . $rowMail['id'] . " ";

        if ($mail->send()) {
        } else {
            echo $mail->ErrorInfo;
        }
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
    return $queryCounter;
}

/**
 * @param $rowInfo
 * @param $rowMail
 * @param array $emailsArray
 * @param PHPMailer $mail
 * @param $rowCron
 * @param mysqli $con
 * @return string
 */
function counterValidate($rowInfo, $rowMail, array $emailsArray, PHPMailer $mail, $rowCron, mysqli $con)
{
    if ($rowInfo['newsletterCounter'] == $rowMail['id']) {
        $emailsInfoArray = $rowInfo['email'];
        for ($k = 0; $k < sizeof($emailsArray); $k++) {
            $queryCounter = sendMail($mail, $emailsArray, $k, $rowInfo, $rowMail);
        }
        $queryRecords = "INSERT INTO newsletterRecords (timeInserted, subject, content, sendFrom, sendTo) VALUES (NOW(), '" . $rowMail['subject'] . "','" . $rowMail['content'] . "', '" . $rowCron['emails'] . "','" . $emailsInfoArray . "')";
        $queryCounter = mysqli_query($con, $queryCounter);
    } else {
        echo "There is no content to send";
    }
    return $queryRecords;
}

/**
 * @param $rowCron
 * @param $rowMail
 * @param $rowInfo
 * @param array $emailsArray
 * @param PHPMailer $mail
 * @param mysqli $con
 */
function eventValidate($rowCron, $rowMail, $rowInfo, array $emailsArray, PHPMailer $mail, mysqli $con)
{
    if ($rowCron['event'] == $rowMail['evento']) {
        $queryRecords = counterValidate($rowInfo, $rowMail, $emailsArray, $mail, $rowCron, $con);
        $queryRecords = mysqli_query($con, $queryRecords);
    }
}

/**
 * @param $resultInfo
 * @param $resultMail
 * @param $rowCron
 * @param array $emailsArray
 * @param PHPMailer $mail
 * @param mysqli $con
 */
function resultInformation($resultInfo, $resultMail, $rowCron, array $emailsArray, PHPMailer $mail, mysqli $con)
{
    if (mysqli_num_rows($resultInfo) > 0) {
        while ($rowInfo = mysqli_fetch_assoc($resultInfo)) {
            if (mysqli_num_rows($resultMail) > 0) {
                while ($rowMail = mysqli_fetch_assoc($resultMail)) {
                    eventValidate($rowCron, $rowMail, $rowInfo, $emailsArray, $mail, $con);
                }
            }
        }
    }
}

/**
 * @param mysqli $con
 * @param $queryMail
 * @param $queryCron
 * @param $queryInfo
 * @param $queryEvents
 * @param $dayNumNow
 * @param $hourNow
 * @param $minutesNow
 * @param PHPMailer $mail
 */
function validateTimeDateDay(mysqli $con, $queryMail, $queryCron, $queryInfo, $queryEvents, $dayNumNow, $hourNow, $minutesNow, PHPMailer $mail)
{
    if (!$resultMail = mysqli_query($con, $queryMail)) {
        exit(mysqli_error($con));
    } else {
        if (!$resultCron = mysqli_query($con, $queryCron)) {
            exit(mysqli_error($con));
        } else {
            if (!$resultInfo = mysqli_query($con, $queryInfo)) {
                exit(mysqli_error($con));
            } else {
                if (!$resultEvents = mysqli_query($con, $queryEvents)) {
                    exit(mysqli_error($con));
                } else {
                    if (mysqli_num_rows($resultCron) > 0) {
                        while ($rowCron = mysqli_fetch_assoc($resultCron)) {
                            if ($rowCron['dateFormat'] == "day") {
                                $dayNumNOW = date("w");
                                echo $dayNumNow;
                                $dayNum = array(date("w", strtotime($rowCron['days'])));
                                $timeExplode = explode(" ", $rowCron['timePicker']);
                                $hourExplode = explode(":", $timeExplode['0']);
                                $minutes = $hourExplode['1'];
                                $emailsArray = explode(",", $rowCron['emails']);
                                if ($timeExplode['1'] == "PM") {
                                    $hour = (int)$hourExplode['0'] + 12;
                                } else {
                                    $hour = (int)$hourExplode['0'];
                                }
                                for ($x = 0; $x < sizeof($dayNum); $x++) {
                                    if ($dayNum[$x] == $dayNumNOW) {
                                        if (($hour == $hourNow) && ($minutes == $minutesNow)) {
                                            resultInformation($resultInfo, $resultMail, $rowCron, $emailsArray, $mail, $con);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

validateTimeDateDay($con, $queryMail, $queryCron, $queryInfo, $queryEvents, $dayNumNow, $hourNow, $minutesNow, $mail);