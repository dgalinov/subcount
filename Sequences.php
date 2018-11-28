<?php
/**
 * Created by PhpStorm.
 * User: DragomirGalinov
 * Date: 26/10/2018
 * Time: 12:54
 */

?>
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
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
              id="bootstrap-css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
              integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
              crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css"/>
        <script src="ckeditor/ckeditor.js"></script>
        <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700,900&subset=latin,latin-ext' rel='stylesheet'
              type='text/css'>
        <script src="https://rawgit.com/dbrekalo/fastsearch/master/dist/fastsearch.min.js"></script>
        <link rel="stylesheet" href="intl-tel-input-master/build/css/intlTelInput.css">
        <link rel="stylesheet" href="intl-tel-input-master/build/css/demo.css">
        <link rel="stylesheet" href="fastselect-master/dist/fastselect.css">
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

    <div class="wrapper" style="float:right">
        <form id="form" name="form" method="post" action="Sequences.php"
              style="height:100%;font-family: 'Nunito', sans-serif;">
            <div class="form-row" style="margin-bottom:20px;">
                <div class="form-holder">
                    <select class="multipleSelect form-control1-3 required" id="logistics"
                            onchange="validateList('logistics')" multiple name="logistics[]" queryInputClass="Search"
                            placeholder="Logistics, Supply Chain & Operations">
                        <option></option>
                        <option value="Logistics & Transportation">Logistics & Transportation</option>
                        <option value="Closed-loop supply chain & Remanufacturing">Closed-loop supply chain &
                            Remanufacturing
                        </option>
                        <option value="Forecast - Demand - Inventory">Forecast - Demand - Inventory</option>
                        <option value="Supply Chain Management">Supply Chain Management</option>
                        <option value="Operations & Plant simulation">Operations & Plant simulation</option>
                        <option value="Supplier Networks">Supplier Networks</option>
                    </select>
                    <script>
                        $('.multipleSelect').fastselect();
                    </script>
                    <i class="zmdi zmdi-caret-down"></i>
                </div>
            </div>
        </form>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>

    <!-- JQUERY STEP -->
    <script src="js/jquery.steps.js"></script>

    <script src="js/main.js"></script>
    <script src="fastselect-master/dist/fastselect.js"></script>
    <script src="fastselect-master/dist/fastselect.standalone.js"></script>
    <script src="fastselect-master/dist/fastselect.min.js"></script>
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
                        <section style='width: 90%;display:none;' id='" . $idComparar . "'>
                                <div id='" . $idComparar . "'>
                                    <p>Email Subject</p>
                                    <textarea class='boxInfo' name='subject_" . $row['id'] . "'>" . $row['subject'] . "</textarea>
                                    <p>Email Content</p>
                                    <textarea class='ckeditor' name='content_" . $row['id'] . "'>" . $row['content'] . "</textarea>
                                    <input type='submit' name='action' value='Save'>
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
    <script>
        $(document).ready(function () {
            $('#framework').multiselect({
                nonSelectedText: 'Select Framework',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth: '400px'
            });

            $('#framework_form').on('submit', function (event) {
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: form_data,
                    success: function (data) {
                        $('#framework option:selected').each(function () {
                            $(this).prop('selected', false);
                        });
                        $('#framework').multiselect('refresh');
                        alert(data);
                    }
                });
            });


        });
    </script>
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
    if ($_POST['action']) {

        $actualStep = $_POST['action'];
        // $conn = mysqli_connect('localhost', 'mytelanto', 'npT4KE5Z', 'bd_leads') OR DIE("ERROR WITH THE CONNECT");
        $conn = mysqli_connect('localhost', 'root', '', 'bd_leads') OR DIE("ERROR WITH THE CONNECT");
        $query = "UPDATE newslettermail SET subject = '" . $_POST['subject_' . $actualStep] . "', content = '" . $_POST['content_' . $actualStep] . "' WHERE id = " . $actualStep;
        if ($result = mysqli_query($conn, $query)) {
            var_dump($query);
        } else {
            echo "ERROR WHILE UPDATING" . mysqli_error($conn);
            var_dump($query);
        }

    }
}

?>