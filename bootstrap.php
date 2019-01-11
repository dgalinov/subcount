<?php
require_once __DIR__.'/vendor/autoload.php';

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


try {
    $DB = new ezSQL_mysqli($user, $password, $database, $host, 'UTF-8');
} catch (Exception $e) {
    die('Error al conectarse a la base de datos');
}


?>