<?php
$servername = "localhost";
$username = "root";
$password = "";

$db= mysqli_connect($servername, $username, $password);
	if (!$db )
			die( "Couldn't connect to MySQL: " .mysql_error());

	
	$db_selected =mysqli_select_db($db ,'project_allocation');
		
if (!$db_selected)
  {
  printf("Can\'t use test_db : ");
  }


?>

