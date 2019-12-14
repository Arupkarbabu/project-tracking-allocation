
<?php
include('../connection.php');
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$sql = "SELECT * FROM `facultydata1` WHERE `email`='".$uname."'";
$r = mysqli_query($db,$sql)
or die();
$a = mysqli_fetch_array($r);

	if($pass===($a['password']))
	{
		session_start();
		$_SESSION['faculty_id']=$a['fid'];
		//echo($_SESSION['faculty_id']);
		header("Location:home.php");
	}
	else
	{
		header("Location:index.php?msg=username or password incorrect");
	}

?>