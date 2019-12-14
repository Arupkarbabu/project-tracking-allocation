
<?php
session_start();
if(!isset($_SESSION['login_user']))
 die(header("location:index.php?msg=You are not logged in"));
?>

<html>
<body style="font-family: Avenir,'Helvetica Neue','Lato','Segoe UI',Helvetica,Arial,sans-serif;">
<center>
<form action="edit_project.php" method="POST">
<?php 
$ID=$_GET['id'];
include('../connection.php');
$q = "SELECT * FROM `projectdata1` WHERE `pid`='".$ID."'";
$r = mysqli_query($db,$q);
$a = mysqli_fetch_array($r);
echo '<input type="hidden" name="pid" value="'.$ID.'">';

$w = "SELECT * FROM `research_field` WHERE `pid`='".$ID."'";
$t = mysqli_query($db,$w);
$u= mysqli_fetch_array($t);
echo '<input type="hidden" name="pid" value="'.$ID.'">';

?>
<table>
<tr>
<td>Project name :</td><td> <input type="text" name="name" value="<?php echo($a['name']);?>"></td>
</tr>
<td>Project field:</td><td> <input type="text" name="name" value="<?php echo($u['rname']);?>"></td>
<tr>
</tr>
</table>
<input type="hidden" name="fid" placeholder="-1"><br>
<input type="submit" value="submit">
</form>

<a href="home.php">Home</a>
<a href="logout.php">logout</a>
</center>
</body>
</html>

<?php 
if(isset($_POST['name']) && isset($_POST['rname']))
{
	$ID=$_POST['pid'];
	$NAME=$_POST['name'];
	$DETAILS=$_POST['rname'];
	$fid=$_POST['f_id'];
	
	//$connection=new PDO('mysql:host=localhost;dbname=project_allocation','root','root');
	//if($connection==null)
	//{
		//echo "Failed to obtain connection please try again";
		//die();
	//}
	
	//$sq2="SELECT * FROM facultydata where sname=$sname";
	//$query2=$connection->prepare($sq2);
//	$query2->execute();
	//$row=$query2->fetch(PDO::FETCH_OBJ);
	//$fid=$row->fid;
	//$r = mysql_query($sq2);
	//$a = mysql_fetch_array($r);
	//$fid = $a['fid'];
	include('../connection.php');
    $sq1 = "UPDATE `projectdata1` SET `name`='".$NAME."', `f_id`='".$fid."' WHERE `pid` = '".$ID."'";
	//$query1=$connection->prepare($sq1);
	//$query1->execute();
	mysqli_query($sq1);


  $sq2 = "UPDATE `research_field` SET `name`='".$NAME."', `f_id`='".$DETAILS."' WHERE `pid` = '".$ID."'";

	mysqli_query($sq2);
	header("Location:editdelete_project.php?msg=details successfully updated");
}

?>
