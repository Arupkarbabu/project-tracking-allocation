<?php
session_start();
if(!isset($_SESSION['login_user']))
 die(header("location:index.php?msg=You are not logged in"));
?>

<?php
$ID=$_GET['id'];
//try
//{
	//$connection=new PDO('mysql:host=localhost;dbname=project_allocation','root','root');
	//if($connection==null)
	//{
	//	echo "Failed to obtain connection please try again";
	//	die();
	//}
	include("../connection.php");
	$UN='1';
	$q = "UPDATE `projectdata1` SET `enable`='".$UN."' WHERE `pid` = '".$ID."'";
	//$query1=$connection->prepare($q);
	//$query1->execute();
	mysqli_query($db,$q);
	header("Location:editdelete_project.php?msg=details successfully updated");
//}
//catch(PDOException $e)
//{
	//echo $e->getMessage();
	//die();
//}
?>