<?php
/**
 * Created by PhpStorm.
 * User: DragomirGalinov
 * Date: 26/10/2018
 * Time: 12:54
 */

?>
<?php
/* Open connection to "zing_db" MySQL database. */
$mysqli = new mysqli("localhost", "user", "password", "zing_db");

/* Check the connection. */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* Fetch result set from t_test table */
$data=mysqli_query($mysqli,"SELECT * FROM t_test");
?>
<html lang=''>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/styles.css">
        <script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
        <script> zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
            ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];</script>
    </head>
    <body>
        <div class="topnav">
            <a class="active" href="#home">Dashboard</a>
            <a href="#news">Sequences</a>
            <a href="#contact">######</a>
            <a href="#about">######</a>
        </div>

        <div id='myChart'></div>

        <!-- Graph -->
        <div>
            <p></p>
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
                        $query = "SELECT * FROM information WHERE 1";

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
        <!-- OPCIONAL PAGE NUMBER NAVIGATION -->
        <div class="pagination">
            <a href="#">&laquo;</a>
            <a class="active" href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
        </div>
    </body>
<html>