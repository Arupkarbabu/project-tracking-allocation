<?php
session_start();
if(!isset($_SESSION['login_user']))
 die(header("location:index.php?msg=You are not logged in"));
?>

<html>
<body style="font-family: Avenir,'Helvetica Neue','Lato','Segoe UI',Helvetica,Arial,sans-serif;">
<center>
<div style="font-size:36px;">Edit student data</div> <br><br>
<form action='edit_student.php' method="post">
<table>
<?php
include('../connection.php');

if(isset($_POST['clgid'])){
	$studentid = $_POST['studentid'];
	$q = "UPDATE `studentdata1` SET `clgid` = '".$_POST['clgid']."', `name` = '".$_POST['name']."', `cpi` = '".$_POST['cpi']."', `sem` = '".$_POST['sem']."', `prg_code` = '".$_POST['prg_code']."', `email` = '".$_POST['email']."', `password` = '".$_POST['password']."' WHERE `studentid` = '".$studentid."'";

	mysqli_query($db,$q)
	or die(mysql_error());
	header("location:show_student.php?msg=true");
}
else{
	$q = "SELECT * FROM `studentdata1` WHERE `studentid`='".$_GET['studentid']."'";
	
	//echo($q);
$r = mysqli_query($db,$q)
or die(mysqli_error($db));

$a = mysqli_fetch_array($r);
echo('<input type="hidden" name="studentid" value="'.$_GET['studentid'].'">');
echo('<tr><td>Collage id :</td><td><input type="text" name="clgid" value="'.$a['clgid'].'"></td></tr>');
echo('<tr><td>Name :</td><td><input type="text" name="name" value="'.$a['name'].'"></td></tr>');
echo('<tr><td>CPI :</td><td><input type="text" name="cpi" value="'.$a['cpi'].'"></td></tr>');
echo('<tr><td>Sem :</td><td><input type="text" name="sem" value="'.$a['sem'].'"></td></tr>');
echo('<tr><td>program :</td><td><input type="text" name="prg_code" value="'.$a['prg_code'].'"></td></tr>');
echo('<tr><td>Email-Id:</td><td><input type="text" name="email" value="'.$a['email'].'"></td></tr>');
echo('<tr><td>Password :</td><td><input type="text" name="password" value="'.$a['password'].'"></td></tr>');

}
?>
</table>
<br>
<input type='submit' value="save">
</form>
<button onclick="location.href = 'show_student.php';">cancel & back</button><br><br>
<a href="home.php">home</a><br>
<a href="logout.php">log out</a>
</center>
</body>
</html>