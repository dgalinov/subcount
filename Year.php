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
$Jan = $Feb = $Mar = $Apr = $May = $Jun = $Jul = $Aug = $Sep = $Oct = $Nov = $Dec = "";
$JanU = $FebU = $MarU = $AprU = $MayU = $JunU = $JulU = $AugU = $SepU = $OctU = $NovU = $DecU = "";


$sql1 = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '01'");
while($row = mysqli_fetch_array($sql1)){
    $Jan	= $row['sub'];
    $JanU	= $row['unsub'];
}
$sql2 = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '02'");
while($row = mysqli_fetch_array($sql2)){
    $Feb	= $row['sub'];
    $FebU	= $row['unsub'];
}
$sql3 = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '03'");
while($row = mysqli_fetch_array($sql3)){
    $Mar	= $row['sub'];
    $MarU	= $row['unsub'];
}
$sql4 = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '04'");
while($row = mysqli_fetch_array($sql4)){
    $Apr	= $row['sub'];
    $AprU	= $row['unsub'];
}
$sql5 = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '05'");
while($row = mysqli_fetch_array($sql5)){
    $May	= $row['sub'];
    $MayU	= $row['unsub'];
}
$sql6 = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '06'");
while($row = mysqli_fetch_array($sql6)){
    $Jun	= $row['sub'];
    $JunU	= $row['unsub'];
}
$sql7 = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '07'");
while($row = mysqli_fetch_array($sql7)){
    $Jul	= $row['sub'];
    $JulU	= $row['unsub'];
}
$sql8 = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '08'");
while($row = mysqli_fetch_array($sql8)){
    $Aug	= $row['sub'];
    $AugU	= $row['unsub'];
}
$sql9 = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '09'");
while($row = mysqli_fetch_array($sql9)){
    $Sep	= $row['sub'];
    $SepU	= $row['unsub'];
}
$sql10 = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '10'");
while($row = mysqli_fetch_array($sql10)){
    $Oct	= $row['sub'];
    $OctU	= $row['unsub'];
}
$sql11 = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '11'");
while($row = mysqli_fetch_array($sql11)){
    $Nov	= $row['sub'];
    $NovU	= $row['unsub'];
}
$sql12 = mysqli_query($db_conx, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '12'");
while($row = mysqli_fetch_array($sql12)){
    $Dec	= $row['sub'];
    $DecU	= $row['unsub'];
}
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
                            <td class='tablaLista'>".$row['date']."</td>
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
            data: [<?php echo $Jan; ?>,<?php echo $Feb; ?>,<?php echo $Mar; ?>,<?php echo $Apr; ?>,<?php echo $May; ?>,<?php echo $Jul; ?>,<?php echo $Jun; ?>,<?php echo $Aug; ?>,<?php echo $Sep; ?>,<?php echo $Oct; ?>,<?php echo $Nov; ?>,<?php echo $Dec; ?>],
            //backgroundColor: 'transparent',
            backgroundColor: 'rgba(1, 173, 50, 0.5)',
            //backgroundColor: 'rgba(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ', 0.4)',
            //backgroundColor: "",
            borderColor: "#00cc66",
            borderWidth: 2,
            label: 'Subscribed' // for legend
        },{
            data: [<?php echo $JanU; ?>,<?php echo $FebU; ?>,<?php echo $MarU; ?>,<?php echo $AprU; ?>,<?php echo $MayU; ?>,<?php echo $JulU; ?>,<?php echo $JunU; ?>,<?php echo $AugU; ?>,<?php echo $SepU; ?>,<?php echo $OctU; ?>,<?php echo $NovU; ?>,<?php echo $DecU; ?>],
            backgroundColor: 'rgba(236, 3, 50, 0.5)',
            borderColor: "#ff5050",
            borderWidth: 2,
            // Changes this dataset to become a line
            type: 'bar',
            label: 'Unsubscribed' // for legend
        }],
        labels: [
            'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'
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