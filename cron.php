<?php
require("db_connection.php");
require("Sequences.php");

$fecha = date('Y-m-d');
if($fecha == '2018-01-19'){
	$conectar->query("UPDATE newslettermail SET content = 'Example FFF' WHERE id = 1 ");
}
?>