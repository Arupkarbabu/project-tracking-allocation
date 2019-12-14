<?php
session_start();
if(!isset($_SESSION['faculty_id']))
 die(header("location:index.php?msg=You are not logged in"));
?>

<html>
<body style="font-family: Avenir,'Helvetica Neue','Lato','Segoe UI',Helvetica,Arial,sans-serif;">
<center>
<div style="font-size:36px;">Edit student data</div> <br><br>
<form action='edit_project.php' method="post">

<table>
<?php


include('../connection.php');

if(isset($_POST['name'])){

	$studentid = $_POST['pid'];
	$q = "UPDATE `projectdata1` SET `name` = '".$_POST['name']."'  WHERE `pid` = '".$studentid."'";

$q1 = "UPDATE `research_field` SET `rname` = '".$_POST['rname']."'  WHERE `pid` = '".$studentid."'";

   mysqli_query($db,$q1)
   or die(mysql_error());
	mysqli_query($db,$q)
	or die(mysql_error());
	header("Location:editdelete_project.php?msg=DETAILS SUCCESSFULYY UPDATED");
}

else{
	$q = "SELECT * FROM `projectdata1` WHERE `pid`='".$_GET['studentid']."'";
	
	//echo($q);
$r = mysqli_query($db,$q)
or die(mysqli_error($db));

$a = mysqli_fetch_array($r);
echo('<input type="hidden" name="studentid" value="'.$_GET['pid'].'">');
echo('<tr><td>Name :</td><td><input type="text" name="name" value="'.$a['name'].'"></td></tr>');
echo('<tr><td>reserach :</td><td><input type="text" rname="rname" value="'.$a['rname'].'"></td></tr>');

}
?>
</table>
<br>
<input type='submit' value="save">
</form>
<a href="home.php">home</a><br>
</center>
</body>
</html>