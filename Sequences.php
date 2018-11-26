<?php
/**
 * Created by PhpStorm.
 * User: DragomirGalinov
 * Date: 26/10/2018
 * Time: 12:54
 */


?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito"/>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
              id="bootstrap-css">
        <script src="ckeditor/ckeditor.js"></script>

    </head>
    <body style="font-family: 'Nunito', sans-serif;background:#d9d9d9">

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
    <div>
        <table>
            <tr>
                <td class="sequenceDay">Mon</td>
                <td class="sequenceDay">Tue</td>
                <td class="sequenceDay">Wed</td>
                <td class="sequenceDay">Thu</td>
                <td class="sequenceDay">Fri</td>
                <td class="sequenceDay">Sat</td>
                <td class="sequenceDay">Sun</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="mon"></td>
                <td><input type="checkbox" name="tue"></td>
                <td><input type="checkbox" name="wed"></td>
                <td><input type="checkbox" name="thu"></td>
                <td><input type="checkbox" name="fri"></td>
                <td><input type="checkbox" name="sat"></td>
                <td><input type="checkbox" name="sun"></td>
            </tr>
        </table>
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
            <section style='width: 90%' id='new'>
                <p>Email Subject</p>
                <textarea class="boxInfo" name="subject"></textarea>
                <p>Email Content</p>
                <textarea class="ckeditor" name="content"></textarea>
                <input type="submit" name="action" value="Start">
            </section>

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
                        <section style='width: 90%;display:none;' id='" . $idComparar . "'>
                                <div id='" . $idComparar . "'>
                                    <p>Email Subject</p>
                                    <textarea class='boxInfo' name='subject2'>" . $row['subject'] . "</textarea>
                                    <p>Email Content</p>
                                    <textarea class='ckeditor' name='content2'>" . $row['content'] . "</textarea>
                                    <input type='submit' name='action' value='Save'>
                                </div>
                        </section> ";
                    }
                }
            }

            ?>
            <input type="hidden" value="" id="actualStep" name="actualStep">
        </form>
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
                        document.getElementById("actualStep").value = i;
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
        if (isset($_POST['subject'])) {
            if (isset($_POST['content'])) {
                $content = $_POST['content'];
                $subject = $_POST['subject'];
                // $conn = mysqli_connect('localhost', 'mytelanto', 'npT4KE5Z', 'bd_leads') OR DIE("ERROR WITH THE CONNECT");
                $conn = mysqli_connect('localhost', 'root', '', 'bd_leads') OR DIE("ERROR WITH THE CONNECT");
                $query = mysqli_query($conn, "INSERT INTO newslettermail(content, subject) VALUES ('$content', '$subject')");
                if ($query) {
                }
            }
        }
    }
    if ($_POST['action'] == 'Save') {
        if (isset($_POST['subject2'])) {
            if (isset($_POST['content2'])) {
                $content = $_POST['content2'];
                $subject = $_POST['subject2'];
                $actualStep = $_POST['actualStep'];
                // $conn = mysqli_connect('localhost', 'mytelanto', 'npT4KE5Z', 'bd_leads') OR DIE("ERROR WITH THE CONNECT");
                $conn = mysqli_connect('localhost', 'root', '', 'bd_leads') OR DIE("ERROR WITH THE CONNECT");
                $query = mysqli_query($conn, "UPDATE newslettermail SET subject = " . $subject . ", content = " . $content . " WHERE id = " . $actualStep . " ");
                if ($query) {
                } else {
                    echo "ERROR WHILE UPDATING";
                }
            }
        }
    }
}


?>