<?php
//Error hide
//error_reporting(0);
ini_set('display_errors', 'On');
$hourExplode = $minutes = $hour = $timeExplode = $dayNumNow = $dayNum = $emailsArray = "";
// Take current hours;
$hourNow = date("G");
// Take current minuts;
$minutesNow = date("i");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Connect to autoload.php
require './vendor/autoload.php';
// Create new PHPMailer;
$mail = new PHPMailer();
// Connect to BD by db_connection.php
require("db_connection.php");
// Into var select the tables we gonna use
$queryInfo = "SELECT * FROM information WHERE webinarsSub = 1";
$queryCron = "SELECT * FROM webinarsCron";
$queryMail = "SELECT * FROM webinarsMail";
$queryEvents = "SELECT * FROM webinarsEvents";
echo "<h1>SendMail</h1>";
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
                        // Check the format
                        if ($rowCron['dateFormat'] == "day") {
                            $dayNumNOW = date("w");
                            // echo $dayNumNow;
                            $dayNum = array(date("w", strtotime($rowCron['days'])));
                            $timeExplode = explode(" ", $rowCron['timePicker']);
                            $hourExplode = explode(":", $timeExplode['0']);
                            $minutes = $hourExplode['1'];
                            $emailsArray = explode(",", $rowCron['emails']);
                            // Format of the time picker
                            if ($timeExplode['1'] == "PM") {
                                $hour = (int)$hourExplode['0'] + 12;
                            } else {
                                $hour = (int)$hourExplode['0'];
                            }
                            for ($x = 0; $x < sizeof($dayNum); $x++) {
                                // Check day of the week if it is the correct
                                if ($dayNum[$x] == $dayNumNOW) {
                                    // Check if the time is the current time
                                    if (($hour == $hourNow) && ($minutes == $minutesNow)) {
                                        if (mysqli_num_rows($resultInfo) > 0) {
                                            while ($rowInfo = mysqli_fetch_assoc($resultInfo)) {
                                                // Check if is an industry or preferences filter introduced in the filter
                                                if (($rowInfo['industry'] == $rowCron['industry']) || ($rowInfo['preferences'] == $rowCron['preferences'])) {
                                                    if (mysqli_num_rows($resultMail) > 0) {
                                                        while ($rowMail = mysqli_fetch_assoc($resultMail)) {
                                                            // Check if the event is the correct
                                                            if ($rowCron['event'] == $rowMail['evento']) {
                                                                // Check if the counter is iqual to the id of the step
                                                                if ($rowInfo['webinarsCounter'] == $rowMail['id']) {
                                                                    $emailsInfoArray = $rowInfo['email'];
                                                                    for ($k = 0; $k < sizeof($emailsArray); $k++) {
                                                                        try {
                                                                            // This is the PHPMailer config that allows you to send the message
                                                                            $mail->SMTPDebug = 0;
                                                                            $mail->isSMTP();
                                                                            $mail->Host = 'smtp.gmail.com';
                                                                            $mail->SMTPAuth = true;
                                                                            $mail->Username = $emailsArray[$k];
                                                                            $mail->Password = 'successFOREVER';
                                                                            $mail->SMTPSecure = 'ssl';
                                                                            $mail->Port = 465;
                                                                            $mail->setFrom('webinars@telanto.com', 'Telanto');
                                                                            $mail->addAddress($rowInfo['email'], $rowInfo['firstname']);
                                                                            $body = $rowMail['content'];
                                                                            $mail->isHTML(true);
                                                                            $mail->Subject = $rowMail['subject'];
                                                                            $mail->Body = $body;
                                                                            $mail->AltBody = strip_tags($body);
                                                                            $queryCounter = "UPDATE information SET webinarsCounter = " . $rowInfo['webinarsCounter'] . "+1 WHERE " . $rowInfo['webinarsCounter'] . " = " . $rowMail['id'] . " ";
                                                                            if ($mail->send()) {
                                                                            } else {
                                                                                echo $mail->ErrorInfo;
                                                                            }
                                                                            echo 'Message has been sent';
                                                                        } catch (Exception $e) {
                                                                            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                                                                        }
                                                                    }
                                                                    // Change the counter +1 for the next step
                                                                    $queryRecords = "INSERT INTO webinarsRecords (timeInserted, subject, content, sendFrom, sendTo) VALUES (NOW(), '" . $rowMail['subject'] . "','" . $rowMail['content'] . "', '" . $rowCron['emails'] . "','" . $emailsInfoArray . "')";
                                                                    $queryCounter = mysqli_query($con, $queryCounter);
                                                                } else {
                                                                    echo "There is no content to send";
                                                                }
                                                                $queryRecords = mysqli_query($con, $queryRecords);
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    if (mysqli_num_rows($resultMail) > 0) {
                                                        while ($rowMail = mysqli_fetch_assoc($resultMail)) {
                                                            if ($rowCron['event'] == $rowMail['evento']) {
                                                                if ($rowInfo['webinarsCounter'] == $rowMail['id']) {
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
                                                                            $mail->setFrom('webinars@telanto.com', 'Telanto');
                                                                            $mail->addAddress($rowInfo['email'], $rowInfo['firstname']);
                                                                            $body = $rowMail['content'];
                                                                            $mail->isHTML(true);
                                                                            $mail->Subject = $rowMail['subject'];
                                                                            $mail->Body = $body;
                                                                            $mail->AltBody = strip_tags($body);
                                                                            $queryCounter = "UPDATE information SET webinarsCounter = " . $rowInfo['webinarsCounter'] . "+1 WHERE " . $rowInfo['webinarsCounter'] . " = " . $rowMail['id'] . " ";
                                                                            if ($mail->send()) {
                                                                            } else {
                                                                                echo $mail->ErrorInfo;
                                                                            }
                                                                            echo 'Message has been sent';
                                                                        } catch (Exception $e) {
                                                                            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                                                                        }
                                                                    }
                                                                    $queryRecords = "INSERT INTO webinarsRecords (timeInserted, subject, content, sendFrom, sendTo) VALUES (NOW(), '" . $rowMail['subject'] . "','" . $rowMail['content'] . "', '" . $rowCron['emails'] . "','" . $emailsInfoArray . "')";
                                                                    $queryCounter = mysqli_query($con, $queryCounter);
                                                                    $queryRecords = mysqli_query($con, $queryRecords);
                                                                } else {
                                                                    echo "There is no content to send";
                                                                }
                                                                //$queryRecords = mysqli_query($con, $queryRecords);
                                                            }
                                                        }
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
                        } else if ($rowCron['dateFormat'] == "date") {
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
                                        if (mysqli_num_rows($resultInfo) > 0) {
                                            while ($rowInfo = mysqli_fetch_assoc($resultInfo)) {
                                                if (mysqli_num_rows($resultMail) > 0) {
                                                    while ($rowMail = mysqli_fetch_assoc($resultMail)) {
                                                        if ($rowCron['event'] == $rowMail['evento']) {
                                                            if ($rowInfo['webinarsCounter'] == $rowMail['id']) {
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
                                                                        $mail->setFrom('webinars@telanto.com', 'Telanto');
                                                                        $mail->addAddress($rowInfo['email'], $rowInfo['firstname']);
                                                                        $body = $rowMail['content'];
                                                                        $mail->isHTML(true);
                                                                        $mail->Subject = $rowMail['subject'];
                                                                        $mail->Body = $body;
                                                                        $mail->AltBody = strip_tags($body);
                                                                        $queryCounter = "UPDATE information SET webinarsCounter = " . $rowInfo['webinarsCounter'] . "+1 WHERE " . $rowInfo['webinarsCounter'] . " = " . $rowMail['id'] . " ";
                                                                        if ($mail->send()) {
                                                                        } else {
                                                                            echo $mail->ErrorInfo;
                                                                        }
                                                                        echo 'Message has been sent';
                                                                    } catch (Exception $e) {
                                                                        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                                                                    }
                                                                }
                                                                $queryRecords = "INSERT INTO webinarsRecords (timeInserted, subject, content, sendFrom, sendTo) VALUES (NOW(), '" . $rowMail['subject'] . "','" . $rowMail['content'] . "', '" . $rowCron['emails'] . "','" . $emailsInfoArray . "')";
                                                                $queryCounter = mysqli_query($con, $queryCounter);
                                                            } else {
                                                                echo "There is no content to send";
                                                            }
                                                            $queryRecords = mysqli_query($con, $queryRecords);
                                                        }
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
                        } else {
                            echo "Date Format doesn't work";
                        }
                    }
                }
            }
        }
    }
}