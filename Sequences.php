<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Telanto</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <script src="ckeditor/ckeditor.js"></script>
    <script src="js/multiselect.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

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
<div class="justified">
    <form method="post" action="Sequences.php">
        <?php
        $checked = "";
        require("db_connection.php");
        $query = "SELECT days FROM crontab WHERE name = 'Newsletter'";
        if (!$result = mysqli_query($con, $query)) {
            exit(mysqli_error($con));
        }
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $emails = $row['emails'];
                $preferencesE = array(
                    implode(",", $emails)
                );
                foreach ($preferencesE AS $arrayD) {
                    if ($arrayD == "Monday") {
                        $checked = "checked = checked";
                    }
                    if ($arrayD == "Tuesday") {
                        $checked = "checked = checked";
                    }
                    if ($arrayD == "Wednesday") {
                        $checked = "checked = checked";
                    }
                    if ($arrayD == "Thursday") {
                        $checked = "checked = checked";
                    }
                    if ($arrayD == "Friday") {
                        $checked = "checked = checked";
                    }
                    if ($arrayD == "Saturday") {
                        $checked = "checked = checked";
                    }
                    if ($arrayD == "Sunday") {
                        $checked = "checked = checked";
                    }
                }
            }
        }
        ?>
        <select id="dias" name="dias[]" class="selectpicker" multiple data-live-search="true">
            <option <?php echo $checked ?> >Monday</option>
            <option <?php echo $checked ?> >Tuesday</option>
            <option <?php echo $checked ?> >Wednesday</option>
            <option <?php echo $checked ?> >Thursday</option>
            <option <?php echo $checked ?> >Friday</option>
            <option <?php echo $checked ?> >Saturday</option>
            <option <?php echo $checked ?> >Sunday</option>
        </select>
        <select id="mails" name="mails[]" class="selectpicker" multiple data-live-search="true">
            <?php
            require("db_connection.php");

            $query = "SELECT * FROM emails ORDER BY id DESC";
            if (!$result = mysqli_query($con, $query)) {
                exit(mysqli_error($con));
            }
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option>" . $row['email'] . "</option>";
                }
            }
            ?>
        </select>
        <input type="submit" class="buttonSaveSequence" name="action" value="SaveAll">
        <label class="labelLabel">
            <textarea placeholder="Input email" cols="50" rows="2" class='labelNewEmail' name="emailSS"></textarea>
        </label>
        <label class="labelLabel">
            <textarea placeholder="Input password" cols="50" rows="2" class='labelNewEmail'
                      name="passwordSS"></textarea>
        </label>
        <input type="submit" class="buttonSaveSequence" name="action" value="New">
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
            <input type="submit" class="buttonStartSave" name="action" value="Start">
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
    if ($_POST['action'] == 'Start') {
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
    if ($_POST['action'] == 'SaveAll') {
        require("db_connection.php");


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

        $query = "UPDATE crontab SET days = '$preferences', emails = '$preferencesEmails' WHERE name = 'Newsletter';";

        $query = mysqli_query($con, $query);
    }
}
if ($_POST) {
    header('Location: ' . $_SERVER['PHP_SELF']);
}
?>