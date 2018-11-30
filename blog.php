<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="author" content="colorlib.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Telanto</title>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
<div class="topnav">
    <a href="index.php">Dashboard</a>
    <a class="active" href="Sequences.php">Sequences</a>
</div>
<div class="topnavS">
    <a  href="Sequences.php">Newsletter</a>
    <a href="challengeaudit.php">Challenge Audit</a>
    <a href="webinars.php">Webinars</a>
    <a class="active" href="blog.php">Blog</a>
</div>

<section class="indent-1">
    <section style="width: 10%">
        <div class="vertical-menu">
            <?php
            $idComparado = "";
            require("db_connection.php");

            $query = "SELECT * FROM blogmail ";
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
    <form action="blog.php" method="post">
        <section style='width: 90%' id='new'>
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
    $query = "SELECT * FROM blogmail ";

    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    } else {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $idComparar = $row['id'];
                echo "
                        <form action='blog.php' method='post'>
                        <section style='width: 90%;display:none;' id='" . $idComparar . "'>
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
                // $conn = mysqli_connect('localhost', 'mytelanto', 'npT4KE5Z', 'bd_leads') OR DIE("ERROR WITH THE CONNECT");
                $conn = mysqli_connect('localhost', 'root', '', 'bd_leads') OR DIE("ERROR WITH THE CONNECT");
                $query = mysqli_query($conn, "INSERT INTO blogmail(content, subject) VALUES ('$content', '$subject')");
                if ($query) {
                }
            }
        }
    }
    if ($_POST['action']) {
        if (!empty($_POST['subject_' . $_POST['action']])) {
            if (!empty($_POST['content_' . $_POST['action']])) {
                $actualStep = $_POST['action'];
                // $conn = mysqli_connect('localhost', 'mytelanto', 'npT4KE5Z', 'bd_leads') OR DIE("ERROR WITH THE CONNECT");
                $conn = mysqli_connect('localhost', 'root', '', 'bd_leads') OR DIE("ERROR WITH THE CONNECT");
                $query = "UPDATE blogmail SET subject = '" . $_POST['subject_' . $actualStep] . "', content = '" . $_POST['content_' . $actualStep] . "' WHERE id = " . $actualStep;
                if ($result = mysqli_query($conn, $query)) {
                    // var_dump($query);
                } else {
                    echo "ERROR WHILE UPDATING" . mysqli_error($conn);
                    // var_dump($query);
                }
            }
        }
    }
}

?>