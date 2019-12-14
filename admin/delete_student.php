
<?php
session_start();
if(!isset($_SESSION['login_user']))
 die(header("location:index.php?msg=You are not logged in"));
?>

<?php
$studentid = $_GET['studentid'];
include('../connection.php');
$q = "DELETE FROM `studentdata1` WHERE `studentid` = '".$studentid."'";
echo($q);
mysqli_query($db,$q)
or die(mysql_error($db));
header("location:show_student.php?msg=true");


?>