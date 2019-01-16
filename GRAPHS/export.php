<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/

// Database Connection
require("db_connection.php");

// get Users
$query = "SELECT * FROM information";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Information.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'First Name', 'Last Name', 'Title', 'Company', 'Email','Industry' ,'Preferences', 'Date', 'Subscribed'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>