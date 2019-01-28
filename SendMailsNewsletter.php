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
 * @return array
 */
function emailStructure(PHPMailer $mail, array $emailsArray, $k, $rowInfo, $rowMail)
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

        $queryCounter = "UPDATE information SET newsletterCounter = " . $rowInfo['newsletterCounter'] . "+1 WHERE " . $rowInfo['newsletterCounter'] . " = " . $rowMail['id'] . " ";

        if ($mail->send()) {
        } else {
            echo $mail->ErrorInfo;
        }
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
    return array($body, $queryCounter);
}

/**
 * @param $rowCron
 * @param $rowMail
 * @param $rowInfo
 * @param array $emailsArray
 * @param PHPMailer $mail
 * @param mysqli $con
 * @return array
 */
function eventDay($rowCron, $rowMail, $rowInfo, array $emailsArray, PHPMailer $mail, mysqli $con)
{
    if ($rowCron['event'] == $rowMail['evento']) {
        if ($rowInfo['newsletterCounter'] == $rowMail['id']) {
            $emailsInfoArray = $rowInfo['email'];
            for ($k = 0; $k < sizeof($emailsArray); $k++) {
                list($body, $queryCounter) = emailStructure($mail, $emailsArray, $k, $rowInfo, $rowMail);
            }
            $queryRecords = "INSERT INTO newsletterRecords (timeInserted, subject, content, sendFrom, sendTo) VALUES (NOW(), '" . $rowMail['subject'] . "','" . $rowMail['content'] . "', '" . $rowCron['emails'] . "','" . $emailsInfoArray . "')";
            $queryCounter = mysqli_query($con, $queryCounter);
        } else {
            echo "There is no content to send";
        }
        $queryRecords = mysqli_query($con, $queryRecords);
    }
    return array($emailsInfoArray, $k, $queryCounter, $queryRecords);
}

/**
 * @param $rowInfo
 * @param $rowCron
 * @param $resultMail
 * @param array $emailsArray
 * @param PHPMailer $mail
 * @param mysqli $con
 * @return array
 */
function industryAndPreferences($rowInfo, $rowCron, $resultMail, array $emailsArray, PHPMailer $mail, mysqli $con)
{
    if ($rowInfo['industry'] == $rowCron['industry']) {
        if ($rowInfo['preferences'] == $rowCron['preferences']) {
            if (mysqli_num_rows($resultMail) > 0) {
                while ($rowMail = mysqli_fetch_assoc($resultMail)) {
                    list($emailsInfoArray, $k, $queryCounter, $queryRecords) = eventDay($rowCron, $rowMail, $rowInfo, $emailsArray, $mail, $con);
                }
            }
        } else if ($rowCron['preferences'] == null) {
            if (mysqli_num_rows($resultMail) > 0) {
                while ($rowMail = mysqli_fetch_assoc($resultMail)) {
                    list($emailsInfoArray, $k, $queryCounter, $queryRecords) = eventDay($rowCron, $rowMail, $rowInfo, $emailsArray, $mail, $con);
                }
            }
        } else {
            echo "Error Preferences";
        }
    } else if ($rowCron['industry'] == null) {
        if ($rowInfo['preferences'] == $rowCron['preferences']) {
            if (mysqli_num_rows($resultMail) > 0) {
                while ($rowMail = mysqli_fetch_assoc($resultMail)) {
                    list($emailsInfoArray, $k, $queryCounter, $queryRecords) = eventDay($rowCron, $rowMail, $rowInfo, $emailsArray, $mail, $con);
                }
            }
        } else if ($rowCron['preferences'] == null) {
            if (mysqli_num_rows($resultMail) > 0) {
                while ($rowMail = mysqli_fetch_assoc($resultMail)) {
                    list($emailsInfoArray, $k, $queryCounter, $queryRecords) = eventDay($rowCron, $rowMail, $rowInfo, $emailsArray, $mail, $con);
                }
            }
        } else {
            echo "Error Preferences";
        }
    } else {
        echo "Industry doesn't work";
    }
    return array($rowMail, $emailsInfoArray, $k, $queryCounter, $queryRecords);
}

/**
 * @param $hour
 * @param $hourNow
 * @param $minutes
 * @param $minutesNow
 * @param $resultInfo
 * @param $rowCron
 * @param $resultMail
 * @param array $emailsArray
 * @param PHPMailer $mail
 * @param mysqli $con
 * @return array
 */
function hourMinutsCompare($hour, $hourNow, $minutes, $minutesNow, $resultInfo, $rowCron, $resultMail, array $emailsArray, PHPMailer $mail, mysqli $con)
{
    if (($hour == $hourNow) && ($minutes == $minutesNow)) {
        if (mysqli_num_rows($resultInfo) > 0) {
            while ($rowInfo = mysqli_fetch_assoc($resultInfo)) {
                list($rowMail, $emailsInfoArray, $k, $queryCounter, $queryRecords) = industryAndPreferences($rowInfo, $rowCron, $resultMail, $emailsArray, $mail, $con);
            }
        }
    } else {
        echo "No funciona TIME";
    }
    return array($rowInfo, $rowMail, $emailsInfoArray, $k, $queryCounter, $queryRecords);
}

/**
 * @param $dayNumNow
 * @param $rowCron
 * @param $hourNow
 * @param $minutesNow
 * @param $resultInfo
 * @param $resultMail
 * @param PHPMailer $mail
 * @param mysqli $con
 * @return array
 */
function DayOfWeekCompare($dayNumNow, $rowCron, $hourNow, $minutesNow, $resultInfo, $resultMail, PHPMailer $mail, mysqli $con)
{
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
            list($rowInfo, $rowMail, $emailsInfoArray, $k, $queryCounter, $queryRecords) = hourMinutsCompare($hour, $hourNow, $minutes, $minutesNow, $resultInfo, $rowCron, $resultMail, $emailsArray, $mail, $con);
        } else {
            echo "No funciona DATE";
        }
    }
    return array($timeExplode, $hourExplode, $minutes, $emailsArray, $hour, $rowInfo, $rowMail, $emailsInfoArray, $k, $queryCounter, $queryRecords);
}

/**
 * @param $rowCron
 * @param $rowMail
 * @param $rowInfo
 * @param array $emailsArray
 * @param PHPMailer $mail
 * @param mysqli $con
 * @return array
 */
function EventStepsCompare($rowCron, $rowMail, $rowInfo, array $emailsArray, PHPMailer $mail, mysqli $con)
{
    if ($rowCron['event'] == $rowMail['evento']) {
        if ($rowCron['step'] == $rowMail['subject']) {
            if ($rowInfo['newsletterCounter'] == $rowMail['id']) {
                $emailsInfoArray = $rowInfo['email'];
                for ($k = 0; $k < sizeof($emailsArray); $k++) {
                    list($body, $queryCounter) = emailStructure($mail, $emailsArray, $k, $rowInfo, $rowMail);
                }
                $queryRecords = "INSERT INTO newsletterRecords (timeInserted, subject, content, sendFrom, sendTo) VALUES (NOW(), '" . $rowMail['subject'] . "','" . $rowMail['content'] . "', '" . $rowCron['emails'] . "','" . $emailsInfoArray . "')";
                $queryCounter = mysqli_query($con, $queryCounter);
            } else {
                echo "There is no content to send";
            }
            $queryRecords = mysqli_query($con, $queryRecords);
        }
    }
    return array($emailsInfoArray, $k, $queryCounter, $queryRecords);
}

/**
 * @param $rowInfo
 * @param $rowCron
 * @param $resultMail
 * @param array $emailsArray
 * @param PHPMailer $mail
 * @param mysqli $con
 */
function IndustryPreferencesCompareDate($rowInfo, $rowCron, $resultMail, array $emailsArray, PHPMailer $mail, mysqli $con)
{
    if ($rowInfo['industry'] == $rowCron['industry']) {
        if ($rowInfo['preferences'] == $rowCron['preferences']) {
            if (mysqli_num_rows($resultMail) > 0) {
                while ($rowMail = mysqli_fetch_assoc($resultMail)) {
                    list($emailsInfoArray, $k, $queryCounter, $queryRecords) = EventStepsCompare($rowCron, $rowMail, $rowInfo, $emailsArray, $mail, $con);
                }
            }
        } else if ($rowCron['preferences'] == null) {
            if (mysqli_num_rows($resultMail) > 0) {
                while ($rowMail = mysqli_fetch_assoc($resultMail)) {
                    list($emailsInfoArray, $k, $queryCounter, $queryRecords) = EventStepsCompare($rowCron, $rowMail, $rowInfo, $emailsArray, $mail, $con);
                }
            }
        } else {
            echo "Error Preferences";
        }
    } else if ($rowCron['industry'] == null) {
        if ($rowInfo['preferences'] == $rowCron['preferences']) {
            if (mysqli_num_rows($resultMail) > 0) {
                while ($rowMail = mysqli_fetch_assoc($resultMail)) {
                    list($emailsInfoArray, $k, $queryCounter, $queryRecords) = EventStepsCompare($rowCron, $rowMail, $rowInfo, $emailsArray, $mail, $con);
                }
            }
        } else if ($rowCron['preferences'] == null) {
            if (mysqli_num_rows($resultMail) > 0) {
                while ($rowMail = mysqli_fetch_assoc($resultMail)) {
                    list($emailsInfoArray, $k, $queryCounter, $queryRecords) = EventStepsCompare($rowCron, $rowMail, $rowInfo, $emailsArray, $mail, $con);
                }
            }
        } else {
            echo "Error Preferences";
        }
    } else {
        echo "Industry doesn't work";
    }
}

/**
 * @param $hour
 * @param $hourNow
 * @param $minutes
 * @param $minutesNow
 * @param $resultInfo
 * @param $rowCron
 * @param $resultMail
 * @param array $emailsArray
 * @param PHPMailer $mail
 * @param mysqli $con
 */
function hoursMinutsCompare($hour, $hourNow, $minutes, $minutesNow, $resultInfo, $rowCron, $resultMail, array $emailsArray, PHPMailer $mail, mysqli $con)
{
    if (($hour == $hourNow) && ($minutes == $minutesNow)) {
        if (mysqli_num_rows($resultInfo) > 0) {
            while ($rowInfo = mysqli_fetch_assoc($resultInfo)) {
                IndustryPreferencesCompareDate($rowInfo, $rowCron, $resultMail, $emailsArray, $mail, $con);
            }
        }
    } else {
        echo "No funciona TIME";
    }
}

/**
 * @param $rowCron
 * @param $hourNow
 * @param $minutesNow
 * @param $resultInfo
 * @param $resultMail
 * @param PHPMailer $mail
 * @param mysqli $con
 */
function fechaCompare($rowCron, $hourNow, $minutesNow, $resultInfo, $resultMail, PHPMailer $mail, mysqli $con)
{
    $fechaNow = date("Y m d");
    $timeExplode = explode(" ", $rowCron['timePicker']);
    $hourExplode = explode(":", $timeExplode['0']);
    $minutes = $hourExplode['1'];
    $emailsArray = explode(",", $rowCron['emails']);
    if ($timeExplode['1'] == "PM") {
        $hour = (int)$hourExplode['0'] + 12;
    } else {
        $hour = (int)$hourExplode['0'];
    }
    if ($fechaNow == $rowCron['datePicker']) {
        hoursMinutsCompare($hour, $hourNow, $minutes, $minutesNow, $resultInfo, $rowCron, $resultMail, $emailsArray, $mail, $con);
    } else {
        echo "No funciona DATE";
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
function resultQuery(mysqli $con, $queryMail, $queryCron, $queryInfo, $queryEvents, $dayNumNow, $hourNow, $minutesNow, PHPMailer $mail)
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
                                list($timeExplode, $hourExplode, $minutes, $emailsArray, $hour, $rowInfo, $rowMail, $emailsInfoArray, $k, $queryCounter, $queryRecords) = DayOfWeekCompare($dayNumNow, $rowCron, $hourNow, $minutesNow, $resultInfo, $resultMail, $mail, $con);
                            } else if ($rowCron['dateFormat'] == "date") {
                                fechaCompare($rowCron, $hourNow, $minutesNow, $resultInfo, $resultMail, $mail, $con);
                            }
                        }
                    }
                }
            }
        }
    }
}

resultQuery($con, $queryMail, $queryCron, $queryInfo, $queryEvents, $dayNumNow, $hourNow, $minutesNow, $mail);