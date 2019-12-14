<?php
session_start();
if(!isset($_SESSION['faculty_id']))
 die(header("location:index.php?msg=YOU ARE NOT LOGGED IN"));
?>
<html>
<body>
<form action="edit_project.php" method="POST">
<?php 
$ID=$_GET['id'];

echo '<input type="hidden" name="pid" value="'.$ID.'">';
?>
<br>
PROJECT NAME:  <input type="text" name="name">
<br>PROJECT FIELD :<input type="text" language="language">
<input type="submit" value="save">
</form>
</body>
</html>

<?php 
if(isset($_POST['name']))
{
	$ID=$_POST['pid'];
	include('../connection.php');
	//$connection=new PDO('mysql:host=localhost;dbname=project_allocation','root','root');
	//if($connection==null)
	//{
	//	echo "Failed to obtain connection please try again";
	//	die();
	//}
 $q = "UPDATE `projectdata1` SET `name` = '".$_POST['name']."'  WHERE `pid` = '".$ID."'";

$q1 = "UPDATE `research_field` SET `rname` = '".$_POST['language']."'  WHERE `pid` = '".$ID."'";


       mysqli_query($db,$sq2);

	//$query1=$connection->prepare($sq1);
	//$query1->execute();
	mysqli_query($db,$sq1);
	header("Location:editdelete_project.php?msg=DETAILS SUCCESSFULYY UPDATED");
}

?>
