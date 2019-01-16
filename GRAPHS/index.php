<?php
ob_start();
error_reporting(0);
require("db_connection.php");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error("Our database server is down at the moment. :(");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Telanto</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div class="row" style="width: 100%">
    <div class="column">
        <canvas id="Chart"></canvas>
    </div>
    <div class="column2">
        <div>
            <h1>DASHBOARD</h1>
            <?php
            require("db_connection.php");

            $query = "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information";

            $result = mysqli_query($con, $query);

            while ($row = $result->fetch_assoc()) {
                $total = $row['sub'];
                $totalU = $row['unsub'];
            }
            ?>
            <h2>Total subscribers: <?php echo $total ?></h2>
            <h4>Total unsubscribed: <?php echo $totalU ?></h4>
        </div>

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
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
<div>
    <br><br>
</div>
<form action="export.php" method="post" name="export_excel">
    <?php
    require("db_connection.php");

    $query = "SELECT firstname, lastname, title, company, email,industry, preferences, date FROM information WHERE week(date) = week(CURDATE()) ORDER BY date desc";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }

    if (mysqli_num_rows($result) > 0) {
        $number = 1;
        $users = '<table class="table table-bordered tablaCSV">
        <tr class="titleTH">
            <th>FirstName</th>
            <th>LastName</th>
            <th>Title</th>
            <th>Company</th>
            <th>E-Mail</th>
            <th>Industry</th>
            <th>Preferences</th>
            <th>DateSubscribed</th>
        </tr>
    ';
        while ($row = mysqli_fetch_assoc($result)) {
            $users .= "<tr>
                            <td class='capital tablaLista'>" . $row['firstname'] . "</td>
                            <td class='capital tablaLista'>" . $row['lastname'] . "</td>
                            <td class='capital tablaLista'>" . $row['title'] . "</td>
                            <td class='capital tablaLista'>" . $row['company'] . "</td>
                            <td class='tablaLista'>" . $row['email'] . "</td>
                            <td class='capital tablaLista'>" . $row['industry'] . "</td>
                            <td class='capital tablaLista'>" . $row['preferences'] . "</td>
                            <td class='tablaLista' style=''>" . $row['date'] . "</td>
                          </tr>";
        }
        $users .= '</table>';
    }

    ?>
    <div class="container">
        <div>
            <div class="form-group" style="float:right">
                <button onclick="Export()" class="btn btn-primary">Export to CSV File</button>
            </div>
        </div>
        <div class="form-group">
            <?php echo $users ?>
        </div>
        <script>
            function Export() {
                window.open("export.php", '_self');
            }
        </script>
    </div>
</form>
</body>
</html>