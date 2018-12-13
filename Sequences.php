<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Telanto</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="ckeditor/ckeditor.js"></script>
    <script src="js/multiselect.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="./css/prettify-1.0.css" rel="stylesheet">
    <link href="./css/base.css" rel="stylesheet">
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
</head>
<body>
<?php
if ($_POST) {
    $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: " . $url);
}
?>
<div class="topnav">
    <a href="index.php">Dashboard</a>
    <a class="active" href="Sequences.php">Sequences</a>
</div>
<div class="topnavS">
    <a class="active" href="Sequences.php">Newsletter</a>
    <a href="challengeaudit.php">Challenge Audit</a>
    <a href="webinars.php">Webinars</a>
    <a href="blog.php">Blog</a>
</div>
<div class="container">
    <form method="post" action="Sequences.php">
        <div class="row">
            <div class="col-">
                <label for="dias"><select id="dias" name="dias[]" class="selectpicker" multiple data-live-search="true" style="height: 50px;line-height: 4;">
                        <?php
                        require("db_connection.php");
                        $query = "SELECT days FROM crontab WHERE name = 'Newsletter'";
                        $result = mysqli_query($con, $query);
                        $row = mysqli_fetch_assoc($result);
                        $row = implode(",", $row);
                        $row = explode(",", $row);
                        $arrayDias = array($row);
                        if (in_array("Monday", $arrayDias)) {
                            echo "<option selected value='Monday'>Monday</option>";
                        } else {
                            echo "<option value='Monday'>Monday</option>";
                        }
                        if (in_array("Tuesday", $arrayDias)) {
                            echo "<option selected value='Tuesday'>Tuesday</option>";
                        } else {
                            echo "<option value='Tuesday'>Tuesday</option>";
                        }
                        if (in_array("Wednesday", $arrayDias)) {
                            echo "<option selected value='Wednesday'>Wednesday</option>";
                        } else {
                            echo "<option value='Wednesday'>Wednesday</option>";
                        }
                        if (in_array("Thursday", $arrayDias)) {
                            echo "<option selected value='Thursday'>Thursday</option>";
                        } else {
                            echo "<option value='Thursday'>Thursday</option>";
                        }
                        if (in_array("Friday", $arrayDias)) {
                            echo "<option selected value='Friday'>Friday</option>";
                        } else {
                            echo "<option value='Friday'>Friday</option>";
                        }
                        if (in_array("Saturday", $arrayDias)) {
                            echo "<option selected value='Saturday'>Saturday</option>";
                        } else {
                            echo "<option value='Saturday'>Saturday</option>";
                        }
                        if (in_array("Sunday", $arrayDias)) {
                            echo "<option selected value='Sunday'>Sunday</option>";
                        } else {
                            echo "<option value='Sunday'>Sunday</option>";
                        }
                        ?>
                    </select>
                </label>
            </div>
            <div class="col-">
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker3'>
                                <input type='text' id="timename" name="tpick" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker3').datetimepicker({
                                format: 'LT'
                            });
                        });
                    </script>
            </div>
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
                <input type="submit" class="buttonSaveSequence" name="action" value="Update">
            </div>
            <div class="col-">
                <input type="text" id="fname" name="emailSS" placeholder="Input email" style="padding-left: 10px">
            </div>
            <div class="col-">
                <input type="text" id="fname" name="passwordSS" placeholder="Input password" style="padding-left: 10px">
            </div>
            <div class="col-">
                <input type="submit" class="buttonSaveSequence" name="action" value="New">
            </div>
        </div>








    </form>
</div>
<section class="indent-1">
    <section style="width: 10%">
        <div class="vertical-menu">
            <?php
            $idComparado = "";
            require("db_connection.php");

            $query = "SELECT * FROM newslettermail";
            if (!$result = mysqli_query($con, $query)) {
                exit(mysqli_error($con));
            }
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $idComparado = $row['id'];
                    echo "<a  onclick='onStepClicked($idComparado)'>" . $row['subject'] . "</a>";
                }
                echo "<input type='hidden' id='stepsNum' value='" . mysqli_num_rows($result) . "'>";
            }
            ?>
            <a class="active" onclick='newStep()'>+</a>
            <input type="submit" class="buttonSaveSequence" name="action" value="START" style="width: 100%;background: #00b6ff;border-radius: 0px">
        </div>
    </section>
    <form action="Sequences.php" method="post">
        <section style='width: 90%' class='sectionMails' id='new'>
            <p>Email Subject</p>
            <label class='labelEmail'>
                <textarea class='labelEmail' name="subject"></textarea>
            </label>
            <p>Email Content</p>
            <label class='labelEmail'>
                <textarea class="ckeditor" name="content"></textarea>
            </label>
            <input type="submit" class="buttonStartSave" name="action" value="Create">
        </section>
    </form>
    <?php
    $idComparar = "";
    require("db_connection.php");
    $query = "SELECT * FROM newslettermail ";

    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    } else {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $idComparar = $row['id'];
                echo "
                        <form action='Sequences.php' method='post'>
                        <section style='width: 90%;display:none;' class='sectionMails' id='" . $idComparar . "'>
                                <div id='" . $idComparar . "'>
                                    <p>Email Subject</p>
                                    <label class='labelEmail'>
                                        <textarea class='labelEmail' name='subject_" . $row['id'] . "'>" . $row['subject'] . "</textarea>
                                    </label>
                                    <p>Email Content</p>
                                    <label class='labelEmail'>
                                        <textarea class='ckeditor' name='content_" . $row['id'] . "'>" . $row['content'] . "</textarea>
                                    </label>
                                    <br>
                                    <input type='submit' class='buttonStartSave' name='action' value='Save'>
                                    <input type='hidden' name='action' value='" . $row['id'] . "'>
                                </div>
                        </section>
                        </form>
                         ";
            }
            echo "<input type='hidden' value='" . mysqli_num_rows($result) . "' id='actualStep' name='actualStep'>";
        }
    }
    ?>
    <script>
        var stepsNum = document.getElementById("stepsNum").value;
        onStepClicked("new");

        function onStepClicked(id) {
            if (id != "new") {
                document.getElementById("new").style.display = "none";
            }
            var i;
            for (i = 1; i < stepsNum + 1; i++) {
                if (i != id) {
                    document.getElementById(i).style.display = "none";
                } else {
                    document.getElementById(i).style.display = "block";
                    document.getElementById("actualStep").value = id;
                }
            }
        }

        function newStep() {
            document.getElementById("new").style.display = "block";
            var i;
            for (i = 1; i < stepsNum + 1; i++) {
                document.getElementById(i).style.display = "none";
            }
        }
    </script>
</section>
</body>
</html>
<?php
if ($_POST) {
    if ($_POST['action'] == 'Create') {
        if (!empty($_POST['subject'])) {
            if (!empty($_POST['content'])) {
                $content = $_POST['content'];
                $subject = $_POST['subject'];
                require("db_connection.php");
                $query = mysqli_query($con, "INSERT INTO newslettermail(content, subject) VALUES ('$content', '$subject')");
            }
        }
    }
    if ($_POST['action']) {
        if (!empty($_POST['subject_' . $_POST['action']])) {
            if (!empty($_POST['content_' . $_POST['action']])) {
                $actualStep = $_POST['action'];
                require("db_connection.php");
                $query = "UPDATE newslettermail SET subject = '" . $_POST['subject_' . $actualStep] . "', content = '" . $_POST['content_' . $actualStep] . "' WHERE id = " . $actualStep;
                if ($result = mysqli_query($con, $query)) {
                    // var_dump($query);
                } else {
                    echo "ERROR WHILE UPDATING" . mysqli_error($con);
                    // var_dump($query);
                }
            }
        }
    }
    if ($_POST['action'] == 'New') {
        $emailA = $_POST['emailSS'];
        $passwordA = $_POST['passwordSS'];
        var_dump($emailA);
        require("db_connection.php");
        $query = "INSERT INTO `emails`(`email`, `password`) VALUES ('$emailA', '$passwordA');";
        if ($result = mysqli_query($con, $query)) {
            echo "New email succesfully created";
            var_dump($query);
        }
    }
    if ($_POST['action'] == 'Update') {
        require("db_connection.php");
        $timeP = $_POST['tpick'];
        $preferences = array(
            implode(",", $_POST['dias'])
        );
        $preferencesEmails = array(
            implode(",", $_POST['mails'])
        );

        $preferences = array_filter($preferences, 'strlen');
        $preferencesEmails = array_filter($preferencesEmails, 'strlen');

        $preferences = implode(",", $preferences);
        $preferencesEmails = implode(",", $preferencesEmails);

        $query = "UPDATE crontab SET days = '$preferences', timePicker = '$timeP', emails = '$preferencesEmails' WHERE name = 'Newsletter';";

        $query = mysqli_query($con, $query);
    }
    else {
        var_dump($con);
        echo "No funciona";
    }
}
if ($_POST) {
    header('Location: ' . $_SERVER['PHP_SELF']);
}
?>