<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <meta name="robots" content="noindex">

    <title>TELANTO</title>

    <meta property="og:title" content="TELANTO - The Global Academic Business Network">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://telanto.com">
    <meta property="og:image" content="https://abc.telanto.com/assets/img/telanto_shareimage.jpg">
    <meta property="og:description" content="Connecting company projects to students anywhere in the world">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://telanto.com">
    <meta name="twitter:title" content="TELANTO - The Global Academic Business Network">
    <meta name="twitter:description" content="Connecting company projects to students anywhere in the world">
    <meta name="twitter:image" content="https://abc.telanto.com/assets/img/telanto_shareimage.jpg">
    <meta name="twitter:site" content="@telanto">

    <link rel="apple-touch-icon" sizes="180x180" href="https://abc.telanto.com/assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="https://abc.telanto.com/assets/img/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="https://abc.telanto.com/assets/img/favicon-194x194.png" sizes="194x194">
    <link rel="icon" type="image/png" href="https://abc.telanto.com/assets/img/android-chrome-192x192.png"
          sizes="192x192 /">
    <link rel="icon" type="image/png" href="https://abc.telanto.com/assets/img/favicon-16x16.png" sizes="16x16">

    <link rel="manifest" href="https://abc.telanto.com/assets/img/manifest.json">
    <link rel="mask-icon" href="https://abc.telanto.com/assets/img/safari-pinned-tab.svg" color="#5677fc">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#5677fc">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#5677fc">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="apple-touch-startup-image" href="ihttps://abc.telanto.com/assets/img/android-chrome-192x192.png">
    <meta name="apple-mobile-web-app-status-bar-style" content="#5677fc">
    <link rel="shortcut icon" type="image/x-icon" href="https://abc.telanto.com/assets/img/favicon.ico">


    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <script src="ckeditor/ckeditor.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="js/multiselect.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen"
          href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="./css/prettify-1.0.css" rel="stylesheet">
    <link href="./css/base.css" rel="stylesheet">
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css"
          rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

</head>
<?php
/*if ($_POST) {
    $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: " . $url);
}*/
?>
<div class="topnavS">
    <a href="Sequences.php">Newsletter</a>
    <a href="challengeaudit.php">Challenge Audit</a>
    <a href="webinars.php">Webinars</a>
    <a href="blog.php">Blog</a>
    <a class="active" href="Now.php">Now</a>
    <input type="submit" class="buttonSaveSequence" name="action" value="New Email" style="float: right">
    <input type="text" id="fname" name="passwordSS" placeholder="Input password"
           style="padding-left: 10px; float: right">
    <input type="text" id="fname" name="emailSS" placeholder="Input email"
           style="padding-left: 10px; float: right">

</div>
<div class="container">
    <form method="post" action="Now.php">
        <div class="row">
            <div class="col-">
                <label for="mails">
                    <select id="mails" name="mails[]" class="selectpicker" multiple data-live-search="true">
                        <?php
                        require("db_connection.php");

                        $query = "SELECT * FROM emails ORDER BY id DESC";
                        $query2 = "SELECT emails FROM crontab WHERE name = 'Newsletter'";
                        if (!$result = mysqli_query($con, $query)) {
                            exit(mysqli_error($con));
                        }
                        $result2 = mysqli_query($con, $query2);
                        $row2 = mysqli_fetch_assoc($result2);
                        $row2 = implode(",", $row2);
                        $arrayEmails = array(explode(",", $row2));
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if (in_array($row['email'], $arrayEmails)) {
                                    echo "<option selected>" . $row['email'] . "</option>";
                                } else {
                                    echo "<option>" . $row['email'] . "</option>";
                                }
                            }
                        }
                        ?>
                    </select>
                </label>
            </div>
            <div class="col-">
                <input type="submit" class="buttonSaveSequence" name="action" value="Add Filter">
            </div>
        </div>
    </form>
</div>
<section class="indent-1">
    selction
    <form action="Now.php" method="post">
        <section style='width: 100%' class='sectionMails' id='new'>
            <p>Email Subject</p>
            <label class='labelEmail'>
                <textarea class='labelEmail' name="subject"
                          style="border: 1px solid #bebcbb;border-radius: 4px;"></textarea>
            </label>
            <p>Email Content</p>
            <label class='labelEmail'>
                <textarea class="ckeditor" name="content"></textarea>
            </label>
            <input type="submit" class="buttonStartSave" name="action" value="Send">
        </section>
    </form>
</section>
</body>
</html>
<?php
$emailsArray = "";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_POST) {
    if ($_POST['action'] == 'Send') {
        if (!empty($_POST['subject'])) {
            if (!empty($_POST['content'])) {
                $content = $_POST['content'];
                $subject = $_POST['subject'];
                require("db_connection.php");
                $query = mysqli_query($con, "INSERT INTO newslettermail(content, subject) VALUES ('$content', '$subject')");
                require './vendor/autoload.php';
                $mail = new PHPMailer();
                require("db_connection.php");
                $queryC = "SELECT * FROM crontab WHERE name = 'Now'";
                $queryI = "SELECT * FROM information";

                if (!$resultCron = mysqli_query($con, $queryC)) {
                    exit(mysqli_error($con));
                } else {
                    if (!$resultInfo = mysqli_query($con, $queryI)) {
                        exit(mysqli_error($con));
                    } else {
                        if (mysqli_num_rows($resultCron) > 0) {
                            while ($rowInfo = mysqli_fetch_assoc($resultInfo)) {
                                while ($rowCronExplode = mysqli_fetch_assoc($resultCron)) {
                                    $emailsArray = explode(",", $rowCronExplode['emails']);
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

                                            $mail->setFrom('newsletter@telanto.com', 'Telanto');
                                            $mail->addAddress($rowInfo['email'], $rowInfo['firstname']);

                                            $body = $_POST['content'];

                                            $mail->isHTML(true);
                                            $mail->Subject = $_POST['subject'];
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
                                    $queryN = "INSERT INTO NowRecords (timeInserted, subject, content, sendFrom, sendTo) VALUES (NOW(), '" . $_POST['subject'] . "','" . $_POST['content'] . "', '" . $rowCronExplode['emails'] . "','" . $emailsInfoArray . "')";

                                }
                                $queryN = mysqli_query($con, $queryN);
                            }
                        }
                    }
                }
            }
        }
    }
    if ($_POST['action'] == 'New Email') {
        $emailA = $_POST['emailSS'];
        $passwordA = $_POST['passwordSS'];
        //var_dump($emailA);
        require("db_connection.php");
        $query = "INSERT INTO `emails`(`email`,`password`) VALUES ('$emailA','$passwordA');";
        if ($result = mysqli_query($con, $query)) {
            echo "New email succesfully created";
            //var_dump($query);
        }
    }
    if ($_POST['action'] == 'Add Filter') {
        require("db_connection.php");
        $preferencesEmails = array(
            implode(",", $_POST['mails'])
        );
        $preferencesEmails = array_filter($preferencesEmails, 'strlen');
        $preferencesEmails = implode(",", $preferencesEmails);

        $query = "UPDATE crontab SET emails = '$preferencesEmails' WHERE name = 'Now';";

        $query = mysqli_query($con, $query);
    }
}

/*if ($_POST) {
    header('Location: ' . $_SERVER['PHP_SELF']);
}*/
?>