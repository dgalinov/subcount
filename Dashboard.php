<?php
/**
 * Created by PhpStorm.
 * User: DragomirGalinov
 * Date: 26/10/2018
 * Time: 12:54
 */


$dataPoints1 = array(
    array("label"=> "2010", "y"=> 36.12),
    array("label"=> "2011", "y"=> 34.87),
    array("label"=> "2012", "y"=> 40.30),
    array("label"=> "2013", "y"=> 35.30),
    array("label"=> "2014", "y"=> 39.50),
    array("label"=> "2015", "y"=> 50.82),
    array("label"=> "2016", "y"=> 74.70)
);
$dataPoints2 = array(
    array("label"=> "2010", "y"=> 64.61),
    array("label"=> "2011", "y"=> 70.55),
    array("label"=> "2012", "y"=> 72.50),
    array("label"=> "2013", "y"=> 81.30),
    array("label"=> "2014", "y"=> 63.60),
    array("label"=> "2015", "y"=> 69.38),
    array("label"=> "2016", "y"=> 98.70)
);

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/styles.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
        <script src='lib/jquery.min.js'></script>
        <script src='lib/moment.min.js'></script>
        <script src='fullcalendar/fullcalendar.js'></script>
        <script>
            window.onload = function () {

                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    theme: "light2",
                    title:{
                        text: "Subcribers & Unsubscribed Chart"
                    },
                    legend:{
                        cursor: "pointer",
                        verticalAlign: "center",
                        horizontalAlign: "right",
                        itemclick: toggleDataSeries
                    },
                    data: [{
                        type: "column",
                        name: "Real Trees",
                        indexLabel: "{y}",
                        yValueFormatString: "$#0.##",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                    },{
                        type: "column",
                        name: "Artificial Trees",
                        indexLabel: "{y}",
                        yValueFormatString: "$#0.##",
                        showInLegend: true,
                        dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();

                function toggleDataSeries(e){
                    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                    }
                    else{
                        e.dataSeries.visible = true;
                    }
                    chart.render();
                }

            }
        </script>
    </head>
    <body>
    <?php



    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bd_leads";



    $conn = new mysqli($servername, $username, $password, $dbname);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
        $query = "SELECT  count(case when WEEKDAY(i.date)=6 THEN i.date END) as Sun,
        count(case when WEEKDAY(i.date)=0 THEN i.date END) as Mon,
        count(case when WEEKDAY(i.date)=1 THEN i.date END) as Tue,
        count(case when WEEKDAY(i.date)=2 THEN i.date END) as Wed,
        count(case when WEEKDAY(i.date)=3 THEN i.date END) as Thu,
        count(case when WEEKDAY(i.date)=4 THEN i.date END) as Fri,
        count(case when WEEKDAY(i.date)=5 THEN i.date END) as Sat,
        sum(case when subscribed then 1 else 0 end) as sub
    FROM information as i
    WHERE i.date BETWEEN '2018-01-01' AND '2020-11-11'
    GROUP BY i.date
    ORDER BY i.date DESC";
        if ($result = $conn->query($query)) {
            while($row = $result->fetch_assoc()) {
                echo "<p>" . $row['Mon'] . "</p>";
                echo "<p>" . $row['Tue'] . "</p>";
                echo "<p>" . $row['Wed'] . "</p>";
                echo "<p>" . $row['Thu'] . "</p>";
                echo "<p>" . $row['Fri'] . "</p>";
                echo "<p>" . $row['Sat'] . "</p>";
                echo "<p>" . $row['Sun'] . "</p>";
            }
        }
    }
    ?>
        <div class="topnav">
            <a class="active" href="Dashboard.php">Dashboard</a>
            <!--<a href="">Sequences</a>-->
        </div>
        <div>
            <br><br>
        </div>
        <div>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
        <div>
            <br><br>
        </div>
        <div>

        </div>
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
                                                <td class='capital'>".$row['firstname']."</td>
                                                <td class='capital'>".$row['lastname']."</td>
                                                <td class='capital'>".$row['title']."</td>
                                                <td class='capital'>".$row['company']."</td>
                                                <td>".$row['email']."</td>
                                                <td class='capital'>".$row['preferences']."</td>
                                                <td>".$row['date']."</td>
                                            </tr>";
                            }
                        }
                    }
                ?>
            </table>
        </div>
    </body>
<html>