<?php
/*
* Version: 1.0.0
* Page: DB Connection
*/

// Connection variables
/*$host = "localhost"; // MySQL host name eg. localhost
$user = "mytelanto"; // MySQL user. eg. root ( if your on localserver)
$password = "npT4KE5Z"; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "bd_leads"; // MySQL Database name*/
// Connection DB from local
$host = "localhost"; // MySQL host name eg. localhost
$user = "root"; // MySQL user. eg. root ( if your on localserver)
$password = ""; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "bd_leads"; // MySQL Database name

// Connect to MySQL Database
$con = new mysqli($host, $user, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>