<?php
	$SERVER   = "localhost";
	$USER     = "root";
	$PASSWORD = "";
	$DATABASE = "crud_test_php"; 

	$conexion = mysqli_connect($SERVER, $USER, $PASSWORD, $DATABASE) or die (mysqli_error(mysqli));
?>