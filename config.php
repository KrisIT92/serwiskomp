<?php
$host = "localhost";
$user = "root";
$pass = "mck01";
$db = "serwiskomp";

$dbcon = new MySQLi($host,$user,$pass,$db);

	if ($dbcon -> connect_errno) 
	{
		die ("ERROR : -> ".$dbcon->connect_error);
	}
?>
