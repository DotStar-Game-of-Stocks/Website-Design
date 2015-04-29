<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'stockforcast';
	$database = 'forecast';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($database, $conn) or die("Oops some thing went wrong");
?>