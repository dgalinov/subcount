<?php
    $conn = mysqli_connect("localhost", "root","", "bd_leads");
    $query = "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information GROUP BY subscribed";
    $result = mysqli_query($conn, $query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        .column {
            float: left;
            width:70%;
        }
        .column2 {
            float: left;
            width:30%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>

<body style="font-family: 'Nunito', sans-serif;background:#d9d9d9">
<div class="topnav">
    <a class="active" href="index.php">Dashboard</a>
    <a href="#Sequences">Sequences</a>
</div>
<div>
    <br><br>
</div>
<div class="row"  style="width: 100%">





    <div class="column2">





        <a href="Day.php" data-title="Awesome Button" style="position: relative;display: inline-block;padding: 0.7em 1.2em;text-decoration: none;
            text-align: center;cursor: pointer;user-select: none;color: white;border-radius: 10px;margin-left: 10px;margin-bottom: 12px;background: linear-gradient(to right, #0088cc 0%, #33ccff 100%);">Day</a>
        <a href="index.php" data-title="Awesome Button" style="position: relative;display: inline-block;padding: 0.7em 1.2em;text-decoration: none;
            text-align: center;cursor: pointer;user-select: none;color: white;border-radius: 10px;margin-left: 10px;margin-bottom: 12px;background: linear-gradient(to right, #0088cc 0%, #33ccff 100%);">Week</a>
        <a href="Month.php" data-title="Awesome Button" style="position: relative;display: inline-block;padding: 0.7em 1.2em;text-decoration: none;
            text-align: center;cursor: pointer;user-select: none;color: white;border-radius: 10px;margin-left: 10px; margin-bottom: 12px;background: linear-gradient(to right, #0088cc 0%, #33ccff 100%);">Month</a>
        <a href="Year.php" data-title="Awesome Button" style="position: relative;display: inline-block;padding: 0.7em 1.2em;text-decoration: none;
            text-align: center;cursor: pointer;user-select: none;color: white;border-radius: 10px;margin-left: 10px; margin-bottom: 12px;background: linear-gradient(to right, #0088cc 0%, #33ccff 100%);">Year</a>
    </div>
</div>
<!-- jQuery cdn -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
<!-- Chart.js cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
<div>
    <br><br>
</div>
<form action="export.php" method="post" name="export_excel">
    <?php
    /*
    * iTech Empires:  Export Data from MySQL to CSV Script
    * Version: 1.0.0
    * Page: Index
    */

    // Database Connection
    require("db_connection.php");

    // List Users
    $query = "SELECT firstname, lastname, title, company, email, preferences, date FROM information WHERE year(date) = year(CURDATE())";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }

    if (mysqli_num_rows($result) > 0) {
        $number = 1;
        $users = '<table class="table table-bordered">
        <tr>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Title</th>
            <th>Company</th>
            <th>E-Mail</th>
            <th>Preferences</th>
            <th>DateSubscribed</th>
        </tr>
    ';
        while ($row = mysqli_fetch_assoc($result)) {
            $users .= "<tr>
                            <td class='capital tablaLista'>".$row['firstname']."</td>
                            <td class='capital tablaLista'>".$row['lastname']."</td>
                            <td class='capital tablaLista'>".$row['title']."</td>
                            <td class='capital tablaLista'>".$row['company']."</td>
                            <td class='tablaLista'>".$row['email']."</td>
                            <td class='capital tablaLista'>".$row['preferences']."</td>
                            <td class='tablaLista' style=''>".$row['date']."</td>
                          </tr>";
        }
        $users .= '</table>';
    }

    ?>
    <div class="container">
        <!--  Header  -->
        <div>
            <div class="form-group" style="float:right">
                <button onclick="Export()" class="btn btn-primary">Export to CSV File</button>
            </div>
        </div>
        <!--  /Header  -->

        <!--  Content   -->
        <div class="form-group">
            <?php echo $users ?>
        </div>

        <!--  /Content   -->

        <script>
            function Export()
            {
                window.open("export.php", "_self");
            }
        </script>
    </div>
</form>
</body>
</html>