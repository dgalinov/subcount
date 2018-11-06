<?php
ob_start();
error_reporting(0);
// connection
$db_conx = mysqli_connect("localhost", "root", "", "chart");
// Evaluate the connection
if (mysqli_connect_errno()) {
    echo mysqli_connect_error("Our database server is down at the moment. :(");
    exit();
} 

$months ='';
$expenses = '';
$revenues = '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Budget Document</title>
</head>

<body>

<h1>Budget Pie Charts</h1>

<?php $sql = mysqli_query($db_conx, "SELECT * FROM chart_data ORDER BY budget_date");
while($row = mysqli_fetch_array($sql)){
	$id		= $row['id'];
	$expense	= $row['expense'];
	$revenue	= $row['revenue'];
	$date	  =  date('M, Y', strtotime($row['budget_date']));
?>
<div style="height:360px; width:360px; margin-top:60px; float:left;">
<h3 align="center"><?php echo $date; ?></h3>

<canvas id="Chart_<?php echo $id; ?>" ></canvas>
</div>
    <!-- jQuery cdn -->
   <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
    <!-- Chart.js cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
    <script>
      // chart element
      var ctx = document.getElementById("Chart_<?php echo $id; ?>");
      //for bar, line
	  /*var data = {
        datasets: [{
          data: [<?php echo $revenue; ?>],
          backgroundColor: ["#455C73"],
          label: 'Revenue' // for legend
        },{
          data: [<?php echo $expense; ?>],
          backgroundColor: ["#9B59B6"],
          label: 'Expense' // for legend
        }],
        labels: ["<?php echo $date; ?>"]
      };*/
	  
	  //for pie, doughnut
	   var data = {
        datasets: [{
          data: [<?php echo $revenue; ?>, <?php echo $expense; ?>],
          backgroundColor: ["#455C73","#9B59B6"]
        }],
        labels: ["Revenue","Expense"]
      };

      var myChart = new Chart(ctx, {
        data: data,
        type: 'pie',
        options: {
			labels: {
				fontColor: 'rgb(255, 99, 132)'
			}
        }
      });
</script>
<?php } ?>
</body>
</html>