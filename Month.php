<?php
ob_start();
error_reporting(0);
require("db_connection.php");
if (mysqli_connect_errno()) {
    echo mysqli_connect_error("Our database server is down at the moment. :(");
    exit();
}
$Jan = $Feb = $Mar = $Apr = $May = $Jun = $Jul = $Aug = $Sep = $Oct = $Nov = $Dec = "";
$JanU = $FebU = $MarU = $AprU = $MayU = $JunU = $JulU = $AugU = $SepU = $OctU = $NovU = $DecU = "";

$sql1 = mysqli_query($con, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '01'");
while($row = mysqli_fetch_array($sql1)){
    $Jan	= $row['sub'];
    $JanU	= $row['unsub'];
}
$sql2 = mysqli_query($con, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '02'");
while($row = mysqli_fetch_array($sql2)){
    $Feb	= $row['sub'];
    $FebU	= $row['unsub'];
}
$sql3 = mysqli_query($con, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '03'");
while($row = mysqli_fetch_array($sql3)){
    $Mar	= $row['sub'];
    $MarU	= $row['unsub'];
}
$sql4 = mysqli_query($con, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '04'");
while($row = mysqli_fetch_array($sql4)){
    $Apr	= $row['sub'];
    $AprU	= $row['unsub'];
}
$sql5 = mysqli_query($con, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '05'");
while($row = mysqli_fetch_array($sql5)){
    $May	= $row['sub'];
    $MayU	= $row['unsub'];
}
$sql6 = mysqli_query($con, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '06'");
while($row = mysqli_fetch_array($sql6)){
    $Jun	= $row['sub'];
    $JunU	= $row['unsub'];
}
$sql7 = mysqli_query($con, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '07'");
while($row = mysqli_fetch_array($sql7)){
    $Jul	= $row['sub'];
    $JulU	= $row['unsub'];
}
$sql8 = mysqli_query($con, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '08'");
while($row = mysqli_fetch_array($sql8)){
    $Aug	= $row['sub'];
    $AugU	= $row['unsub'];
}
$sql9 = mysqli_query($con, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '09'");
while($row = mysqli_fetch_array($sql9)){
    $Sep	= $row['sub'];
    $SepU	= $row['unsub'];
}
$sql10 = mysqli_query($con, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '10'");
while($row = mysqli_fetch_array($sql10)){
    $Oct	= $row['sub'];
    $OctU	= $row['unsub'];
}
$sql11 = mysqli_query($con, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '11'");
while($row = mysqli_fetch_array($sql11)){
    $Nov	= $row['sub'];
    $NovU	= $row['unsub'];
}
$sql12 = mysqli_query($con, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information WHERE year(date) = year(CURDATE()) AND month(date) = '12'");
while($row = mysqli_fetch_array($sql12)){
    $Dec	= $row['sub'];
    $DecU	= $row['unsub'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Telanto</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div class="topnav">
    <a class="active" href="index.php">Dashboard</a>
    <a href="Sequences.php">Sequences</a>
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
            <h1>DASHBOARD</h1>
            <?php
            require("db_connection.php");
            $result = mysqli_query($con, "SELECT SUM(subscribed = 1) as sub,SUM(subscribed = 0) as unsub FROM information");
            while($row = $result->fetch_assoc()){
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
<div>
    <br><br>
</div>
<form action="export.php" method="post" name="export_excel">
    <?php
    require("db_connection.php");
    $query = "SELECT firstname, lastname, title, company, email,industry, preferences, date FROM information WHERE year(date) = year(CURDATE()) ORDER BY date desc";
    if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error($con));
    }
    if (mysqli_num_rows($result) > 0) {
        $number = 1;
        $users = '<table class="table table-bordered">
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
                            <td class='capital tablaLista'>".$row['firstname']."</td>
                            <td class='capital tablaLista'>".$row['lastname']."</td>
                            <td class='capital tablaLista'>".$row['title']."</td>
                            <td class='capital tablaLista'>".$row['company']."</td>
                            <td class='tablaLista'>".$row['email']."</td>
                            <td class='capital tablaLista'>".$row['industry']."</td>
                            <td class='capital tablaLista'>".$row['preferences']."</td>
                            <td class='tablaLista' style=''>".$row['date']."</td>
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
            function Export()
            {
                window.open("export.php", "_self");
            }
        </script>
    </div>
</form>
</body>
</html>
<script>
    var ctx = document.getElementById("Chart");
    var data = {
        datasets: [{
            data: [<?php echo $Jan; ?>,<?php echo $Feb; ?>,<?php echo $Mar; ?>,<?php echo $Apr; ?>,<?php echo $May; ?>,<?php echo $Jul; ?>,<?php echo $Jun; ?>,<?php echo $Aug; ?>,<?php echo $Sep; ?>,<?php echo $Oct; ?>,<?php echo $Nov; ?>,<?php echo $Dec; ?>],
            backgroundColor: 'rgba(1, 173, 50, 0.5)',
            borderColor: "#00cc66",
            borderWidth: 2,
            label: 'Subscribed'
        },{
            data: [<?php echo $JanU; ?>,<?php echo $FebU; ?>,<?php echo $MarU; ?>,<?php echo $AprU; ?>,<?php echo $MayU; ?>,<?php echo $JulU; ?>,<?php echo $JunU; ?>,<?php echo $AugU; ?>,<?php echo $SepU; ?>,<?php echo $OctU; ?>,<?php echo $NovU; ?>,<?php echo $DecU; ?>],
            backgroundColor: 'rgba(236, 3, 50, 0.5)',
            borderColor: "#ff5050",
            borderWidth: 2,
            type: 'bar',
            label: 'Unsubscribed'
        }],
        labels: [
            'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'
        ]
    };

    var xChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            legend: {
                display: true,
                position: 'left',
                labels: {
                    fontColor: 'black'
                }
            },
            tooltips: {
                mode: 'y'
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