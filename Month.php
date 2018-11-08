<?php
ob_start();
error_reporting(0);
// connection
$db_conx = mysqli_connect("localhost", "root", "", "bd_leads");
// Evaluate the connection
if (mysqli_connect_errno()) {
    echo mysqli_connect_error("Our database server is down at the moment. :(");
    exit();
}
//initialize variables
$mUnsubs = $tUnsubs = $wUnsubs = $thUnsubs = $fUnsubs = $sUnsubs = $suUnsubs = "";
$mSubs  = $tSubs = $wSubs = $thSubs = $fSubs = $sSubs = $suSubs = "";


$sqlMon = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE week(date) = week(CURDATE()) AND weekday(date) = '0'");
while($row = mysqli_fetch_array($sqlMon)){
    $mSubs	= $row['sub'];
    $mUnsubs	= $row['unsub'];
}
$sqlTue = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE week(date) = week(CURDATE()) AND weekday(date) = '1'");
while($row = mysqli_fetch_array($sqlTue)){
    $tSubs	= $row['sub'];
    $tUnsubs	= $row['unsub'];
}
$sqlWed = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE week(date) = week(CURDATE()) AND weekday(date) = '2'");
while($row = mysqli_fetch_array($sqlWed)){
    $wSubs	= $row['sub'];
    $wUnsubs	= $row['unsub'];
}
$sqlThu = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE week(date) = week(CURDATE()) AND weekday(date) = '3'");
while($row = mysqli_fetch_array($sqlThu)){
    $thSubs	= $row['sub'];
    $thUnsubs	= $row['unsub'];
}
$sqlFri = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE week(date) = week(CURDATE()) AND weekday(date) = '4'");
while($row = mysqli_fetch_array($sqlFri)){
    $fSubs	= $row['sub'];
    $fUnsubs	= $row['unsub'];
}
$sqlSat = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE week(date) = week(CURDATE()) AND weekday(date) = '5'");
while($row = mysqli_fetch_array($sqlSat)){
    $sSubs	= $row['sub'];
    $sUnsubs	= $row['unsub'];
}
$sqlSun = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE week(date) = week(CURDATE()) AND weekday(date) = '6'");
while($row = mysqli_fetch_array($sqlSun)){
    $suSubs	= $row['sub'];
    $suUnsubs	= $row['unsub'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
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
    <div class="column">
        <canvas id="Chart" ></canvas>
    </div>
    <div class="column2">
        <div>
            <h1 style="color: #08c;font-family: 'Nunito', sans-serif;">DASHBOARD</h1>
            <?php
            $db_conn = mysqli_connect("localhost", "root", "", "bd_leads");

            $result = mysqli_query($db_conn, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information");
            while($row = $result->fetch_assoc()){
                $total = $row['sub'];
                $totalU = $row['unsub'];
            }
            ?>
            <h2 style="color: #08c;font-family: 'Nunito', sans-serif;">Total subscribers: <?php echo $total ?></h2>
            <h4 style="color: #ff5050;font-family: 'Nunito', sans-serif;">Total unsubscribed: <?php echo $totalU ?></h4>
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
<!-- jQuery cdn -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
<!-- Chart.js cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
<div>
    <br><br>
</div>
<div>
    <table>
        <tr>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Title</th>
            <th>Company</th>
            <th>E-Mail</th>
            <th>Preferences</th>
            <th>Date Subscribed</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bd_leads";

        $conn = new mysqli($servername, $username, $password, $dbname);
        $cat_names = array();

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        } else {
            $query = "SELECT * FROM information AS i ORDER BY i.date DESC";

            if ($result = $conn->query($query)) {
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                            <td class='capital tablaLista'>".$row['firstname']."</td>
                            <td class='capital tablaLista'>".$row['lastname']."</td>
                            <td class='capital tablaLista'>".$row['title']."</td>
                            <td class='capital tablaLista'>".$row['company']."</td>
                            <td class='tablaLista'>".$row['email']."</td>
                            <td class='capital tablaLista'>".$row['preferences']."</td>
                            <td class='tablaLista' style=''>".$row['date']."</td>
                          </tr>";
                }
            }
        }
        ?>
    </table>
</div>
</body>
</html>
<script>

    // chart DOM Element
    var ctx = document.getElementById("Chart");
    var data = {
        datasets: [{
            data: [<?php echo $mSubs; ?>,<?php echo $tSubs; ?>,<?php echo $wSubs; ?>,<?php echo $thSubs; ?>,<?php echo $fSubs; ?>,<?php echo $sSubs; ?>,<?php echo $suSubs; ?>],
            //backgroundColor: 'transparent',
            backgroundColor: 'rgba(1, 173, 50, 0.5)',
            //backgroundColor: 'rgba(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ', 0.4)',
            //backgroundColor: "",
            borderColor: "#00cc66",
            borderWidth: 2,
            label: 'Subscribed' // for legend
        },{
            data: [<?php echo $mUnsubs; ?>,<?php echo $tUnsubs; ?>,<?php echo $wUnsubs; ?>,<?php echo $thUnsubs; ?>,<?php echo $fUnsubs; ?>,<?php echo $sUnsubs; ?>,<?php echo $suUnsubs; ?>],
            backgroundColor: 'rgba(236, 3, 50, 0.5)',
            borderColor: "#ff5050",
            borderWidth: 2,
            // Changes this dataset to become a line
            type: 'bar',
            label: 'Unsubscribed' // for legend
        }],
        labels: [
            'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'
        ]
    };

    var xChart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: data,
        // Configuration options go here
        options: {
            legend: {
                display: true,
                position: 'left',
                labels: {
                    fontColor: 'black'
                    //fontColor: 'rgb(255, 99, 132)'
                }
            },
            tooltips: {
                mode: 'n'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    ticks: {
                        autoskip: true,
                        maxTicksLimit:20
                    }
                }]
            }
        }
    });
</script>