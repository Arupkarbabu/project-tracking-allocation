
<?php
session_start();
if(!isset($_SESSION['login_user']))
 die(header("location:index.php?msg=You are not logged in"));
?>


<?php
	$ID=$_GET['id'];
	include('../connection.php');
	$UN='0';
	$q = "UPDATE `projectdata1` SET `enable`='".$UN."' WHERE `pid` = '".$ID."'";
	mysqli_query($db,$q)
	or die("".mysql_error());
	header("Location:editdelete_project.php?msg=details successfully updated");
?>